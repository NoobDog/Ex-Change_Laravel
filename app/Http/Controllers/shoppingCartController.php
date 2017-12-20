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

			//$stripe = Stripe::make('pk_test_oUFORtFF2ZktB74kLH7vCtAa');
			$stripe = Stripe::make(env('STRIPE_SECRET'));
			
			$account = $stripe->account()->details();
			return \View::make('shoppingCart',['shoppingCart' => $shoppingCart, 'details' => $account]);
		}
	
}
