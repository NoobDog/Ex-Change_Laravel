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
				return $tok;
				$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
				$shoppingCart = json_decode(json_encode($shoppingCart),true);
				$totalCharge = 0;
				foreach ($shoppingCart as $cartItem) {
					$totalCharge += $cartItem['bookprice'];
				}
				\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
				// Charge the user's card:
				$charge = \Stripe\Charge::create(array(
					"amount" => $totalCharge,
					"currency" => "cad",
					"description" => Session::get('userName'),
					"source" => $card['id'],
				));
				
			} catch(\Stripe\Error\Card $e) {
				// Since it's a decline, \Stripe\Error\Card will be caught
				$body = $e->getJsonBody();
				$err  = $body['error'];

				$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ? AND sc.status = ?', [Session::get('userID'), 'addCart']);
				$shoppingCart = json_decode(json_encode($shoppingCart),true);
				$userCards = DB::select('SELECT * FROM creditCard WHERE userID = ? AND isConfirmed = ? AND isVoid = ?', [Session::get('userID'), 1, 0]);
				$userCards = json_decode(json_encode($userCards),true);
				\View::share(['page_name_active'=> 'cart']);
				return view('shoppingCart',['page_name_active'=> 'cart','shoppingCart' => $shoppingCart, 'userCards' => $userCards, 'errorMsg'=> $err['message']]);
				// print('Status is:' . $e->getHttpStatus() . "\n");
				// print('Type is:' . $err['type'] . "\n");
				// print('Code is:' . $err['code'] . "\n");
			
				//  // param is '' in this case
				// print('Param is:' . $err['param'] . "\n");
				// print('Message is:' . $err['message'] . "\n");
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
