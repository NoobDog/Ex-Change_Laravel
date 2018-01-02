<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
use Stripe;
class bankController extends Controller
{

		public function index() {

			$userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
            $userCard = json_decode(json_encode($userCard),true)[0];
			\View::share(['page_name_active'=> 'myEx-change']);

			return \View::make('bank',['userCard' => $userCard]);
        }
        
        public function addCard(Request $request) {
			$nameOnCard = $request->input('nameOnCard');
			$cardNumber = $request->input('cardNumber');
			$cvv = $request->input('cvv');
			$expiryYear = $request->input('expiryYear');
            $expiryMonth = $request->get('expiryMonth');
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
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
					$newAccount = \Stripe\Account::create(array(
						"type" => "standard",
						"country" => "CA",
						"email" => Session::get('userEmail')
					));
					DB::update('UPDATE users SET stripeAccount = ? where userID = ?', [$newAccount['id'], Session::get('userID')]);
                }
                DB::insert('INSERT INTO creditCard (userID, cardNumber, cardType, cardVaildDate, cardHolder, isConfirmed,
                isVoid, cvc)
                values (?, ?, ?, ?, ?, ?, ?, ?)',
                [Session::get('userID'),$cardNumber,'null', $expiryYear.'-'.$expiryMonth,$nameOnCard,1,0,$cvv]
                );

            }catch(\Stripe\Error\Card $e) {
				// Since it's a decline, \Stripe\Error\Card will be caught
				$body = $e->getJsonBody();
                $err  = $body['error'];
                
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
			} catch (\Stripe\Error\InvalidRequest $e) {
				// Invalid parameters were supplied to Stripe's API
				$body = $e->getJsonBody();
				$err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
			} catch (\Stripe\Error\Authentication $e) {
				// Authentication with Stripe's API failed
				// (maybe you changed API keys recently)
				$body = $e->getJsonBody();
				$err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
			} catch (\Stripe\Error\ApiConnection $e) {
				// Network communication with Stripe failed
				$body = $e->getJsonBody();
				$err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
			} catch (\Stripe\Error\Base $e) {
				// Display a very generic error to the user, and maybe send
				// yourself an email
				$body = $e->getJsonBody();
				$err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
			} catch (Exception $e) {
				// Something else happened, completely unrelated to Stripe
				$body = $e->getJsonBody();
				$err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            }
            return $this->index();
        }

        public function editCard(Request $request) {
			$nameOnCard = $request->input('nameOnCard');
			$cardNumber = $request->input('cardNumber');
			$cvv = $request->input('cvv');
			$expiryYear = $request->input('expiryYear');
            $expiryMonth = $request->get('expiryMonth');
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
				$card = \Stripe\Token::create(array(
					"card" => array(
					  "number" => $cardNumber,
					  "exp_month" => $expiryMonth,
					  "exp_year" => $expiryYear,
					  "cvc" => $cvv
					)
				  ));
                DB::update('UPDATE creditCard SET cardNumber = ?, cardVaildDate = ?, cardHolder = ?, cvc = ?', 
                [$cardNumber, $expiryYear.'-'.$expiryMonth, $nameOnCard,$cvv]);

            }catch(\Stripe\Error\Card $e) {
                // Since it's a decline, \Stripe\Error\Card will be caught
                $body = $e->getJsonBody();
                $err  = $body['error'];
                
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            } catch (\Stripe\Error\InvalidRequest $e) {
                // Invalid parameters were supplied to Stripe's API
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            } catch (\Stripe\Error\Authentication $e) {
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            } catch (\Stripe\Error\ApiConnection $e) {
                // Network communication with Stripe failed
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            } catch (\Stripe\Error\Base $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $userCard = DB::select('SELECT * FROM creditCard WHERE userID = ?', [Session::get('userID')]);
                $userCard = json_decode(json_encode($userCard),true)[0];
                \View::share(['page_name_active'=> 'myEx-change']);
                return \View::make('bank',['userCard' => $userCard, 'errorMsg' => $err]);
            }
            return $this->index();
        }
}
