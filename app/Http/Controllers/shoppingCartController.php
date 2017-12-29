<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
use Stripe;
class shoppingCartController extends Controller
{

		public function index() {
			$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
			$shoppingCart = json_decode(json_encode($shoppingCart),true);
			$userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
			$userCards = json_decode(json_encode($userCards),true);
			\View::share(['page_name_active'=> 'cart']);

			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


			return \View::make('shoppingCart',['shoppingCart' => $shoppingCart, 'userCards' => $userCards]);
		}
		public function addCardAndCheckOut(Request $request) {
			$nameOnCard = $request->input('nameOnCard');
			$cardNumber = $request->input('cardNumber');
			$cvv = $request->input('cvv');
			$expiryYear = $request->input('expiryYear');
			$expiryMonth = $request->get('expiryMonth');

			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

			  try {
				// Use Stripe's bindings...
				$card = \Stripe\Token::create(array(
					"card" => array(
					  "number" => $cardNumber,
					  "exp_month" => $expiryMonth,
					  "exp_year" => $expiryYear,
					  "cvc" => $cvv
					)
				  ));
				$tok = $card['id'];
				$cardTok = $card['card']['id'];
				//check stripe account.
				$userStripeAccount = DB::select('SELECT stripeAccount FROM users WHERE userID = ?', [Session::get('userID')]);
				$userStripeAccount = json_decode(json_encode($userStripeAccount),true)[0];
				

				if(is_null($userStripeAccount['stripeAccount'])) {
					//add new stripe account.
					// $newAccount = \Stripe\Account::create(array(
					// 	"type" => "standard",
					// 	"country" => "CA",
					// 	"email" => Session::get('userEmail')
					// ));
					
					$account = \Stripe\Account::retrieve('acct_1BeLyFJLrPN3G5ik');
					$account->external_accounts->create(array("external_account" => $cardTok));
					return $newAccount;
				}



				$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription, b.userID AS bookUser FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
				$shoppingCart = json_decode(json_encode($shoppingCart),true);
				$totalCharge = 0;
				foreach ($shoppingCart as $cartItem) {
					$totalCharge += $cartItem['bookprice'];
				}
				try {
					// Charge the user's card:
					$totalCharge = $totalCharge * 100;
					$charge = \Stripe\Charge::create(array(
						"amount" => $totalCharge,
						"currency" => "cad",
						"description" => Session::get('userName'),
						"source" => $tok
					));
					if(isset($charge['id'])) {
						DB::insert('INSERT INTO creditCard (userID, cardNumber, cardType, cardVaildDate, cardHolder, isConfirmed,
							isVoid, cvc)
							values (?, ?, ?, ?, ?, ?, ?, ?)',
							[Session::get('userID'),$cardNumber,'null', $expiryYear.'-'.$expiryMonth,$nameOnCard,1,0,$cvv]
						);
						foreach ($shoppingCart as $cartItem) {
							//need to convert back
							//DB::update('UPDATE shoppingCart SET status = ? where bookID = ?', ['userPaid', $cartItem['bookID']]);
							$userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [$cartItem['bookUser']]);
							$userCard = json_decode(json_encode($userCard),true)[0];
							if(!empty($userCard)) {
								$card = array(
									"number" => $userCard['cardNumber'],
									"exp_month" => explode('-',$userCard['cardVaildDate'])[1],
									"exp_year" => explode('-',$userCard['cardVaildDate'])[0],
									"cvc" => $userCard['cvc']
								);
								try{
									$Tcard = \Stripe\Token::create(array(
										"card" => array(
										  "number" => $userCard['cardNumber'],
										  "exp_month" => explode('-',$userCard['cardVaildDate'])[1],
										  "exp_year" =>explode('-',$userCard['cardVaildDate'])[0],
										  "cvc" => $userCard['cvc']
										)
									  ));
									$tok = $Tcard['id'];
				
									//return $tok;
									$recipient = \Stripe\Recipient::create(array(
										"name" => $userCard['cardHolder'],
										"type" => "individual",
										"card" => $tok
									));
									return $recipient;
									$transfer = \Stripe\Transfer::create(array(
										"amount" => $cartItem['bookprice'] * 100,
										"currency" => "cad",
										"destination" => $recipient['id']
									));
									
								}
								catch(\Stripe\Error\Card $e) {
									// Since it's a decline, \Stripe\Error\Card will be caught
									$body = $e->getJsonBody();
									$err  = $body['error'];
									return $err;
									// $shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
									// $shoppingCart = json_decode(json_encode($shoppingCart),true);
									// $userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
									// $userCards = json_decode(json_encode($userCards),true);
									return view('shoppingCart',['page_name_active'=> 'cart','shoppingCart' => $shoppingCart, 'userCards' => $userCards, 'errorMsg'=> $err['message']]);
								  } catch (\Stripe\Error\RateLimit $e) {
									// Too many requests made to the API too quickly
								  } catch (\Stripe\Error\InvalidRequest $e) {
									// Invalid parameters were supplied to Stripe's API
								  } catch (\Stripe\Error\Authentication $e) {
									// Authentication with Stripe's API failed
									// (maybe you changed API keys recently)
								  } catch (\Stripe\Error\ApiConnection $e) {
									// Network communication with Stripe failed
								  } catch (\Stripe\Error\Base $e) {
									// Display a very generic error to the user, and maybe send
									// yourself an email
								  } catch (Exception $e) {
									// Something else happened, completely unrelated to Stripe
								  }

							} else {
								DB::update('UPDATE books SET needTransfer = ? where bookID = ?', [1, $cartItem['bookID']]);
							}

						}
					} else {
						$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
						$shoppingCart = json_decode(json_encode($shoppingCart),true);
						$userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
						$userCards = json_decode(json_encode($userCards),true);
						$errorMsg = "Something is worng, Please try again!";
						return view('shoppingCart',['page_name_active'=> 'cart','shoppingCart' => $shoppingCart, 'userCards' => $userCards, 'errorMsg'=> $errorMsg]);
					}
					return redirect()->route('home');
				} catch(\Stripe\Error\Card $e) {
				// Since it's a decline, \Stripe\Error\Card will be caught
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
				$shoppingCart = json_decode(json_encode($shoppingCart),true);
				$userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
				$userCards = json_decode(json_encode($userCards),true);
				return view('shoppingCart',['page_name_active'=> 'cart','shoppingCart' => $shoppingCart, 'userCards' => $userCards, 'errorMsg'=> $err['message']]);
				} catch (\Stripe\Error\RateLimit $e) {
				// Too many requests made to the API too quickly
				} catch (\Stripe\Error\InvalidRequest $e) {
				// Invalid parameters were supplied to Stripe's API
				} catch (\Stripe\Error\Authentication $e) {
				// Authentication with Stripe's API failed
				// (maybe you changed API keys recently)
				} catch (\Stripe\Error\ApiConnection $e) {
				// Network communication with Stripe failed
				} catch (\Stripe\Error\Base $e) {
				// Display a very generic error to the user, and maybe send
				// yourself an email
				} catch (Exception $e) {
				// Something else happened, completely unrelated to Stripe
				}
			} catch(\Stripe\Error\Card $e) {
				// Since it's a decline, \Stripe\Error\Card will be caught
				$body = $e->getJsonBody();
				$err  = $body['error'];

				$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
				$shoppingCart = json_decode(json_encode($shoppingCart),true);
				$userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
				$userCards = json_decode(json_encode($userCards),true);
				return view('shoppingCart',['page_name_active'=> 'cart','shoppingCart' => $shoppingCart, 'userCards' => $userCards, 'errorMsg'=> $err['message']]);
			} catch (\Stripe\Error\InvalidRequest $e) {
				// Invalid parameters were supplied to Stripe's API
			} catch (\Stripe\Error\Authentication $e) {
				// Authentication with Stripe's API failed
				// (maybe you changed API keys recently)
			} catch (\Stripe\Error\ApiConnection $e) {
				// Network communication with Stripe failed
			} catch (\Stripe\Error\Base $e) {
				// Display a very generic error to the user, and maybe send
				// yourself an email
			} catch (Exception $e) {
				// Something else happened, completely unrelated to Stripe
			}

		}
}
