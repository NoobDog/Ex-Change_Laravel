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
			$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ?', [Session::get('userID')]);
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
			$card = \Stripe\Token::create(array(
				"card" => array(
				  "number" => $cardNumber,
				  "exp_month" => $expiryMonth,
				  "exp_year" => $expiryYear,
				  "cvc" => $cvv
				)
			  ));
			  return $card;
			$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ?', [Session::get('userID')]);
			$shoppingCart = json_decode(json_encode($shoppingCart),true);
		}
}
