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
			\View::share(['page_name_active'=> 'cart']);

			
			$stripe = Stripe::make(env('STRIPE_SECRET'));
			$account = $stripe->account()->details();

			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$test = \Stripe\Account::all(array("limit" => 3));
			//$account = json_decode(json_encode($account),true);
			return \View::make('shoppingCart',['shoppingCart' => $shoppingCart, 'details' => $test]);
		}
	
}
