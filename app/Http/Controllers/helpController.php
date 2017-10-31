<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//use Stripe;
class helpController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }
		public function index() {
			\View::share(['page_name_active'=> 'help']);
            return \View::make('help');
		}
		public function stripe(Request $request) {
			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$token  = $request->input('stripeToken');
			$customer = \Stripe\Customer::create(array(
				'email' => 'customer@example.com',
				'source'  => $token
			));
		  
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => 5000,
				'currency' => 'cad'
			));
			// $data = \Stripe\Charge::create(array(
			// 	"amount" => 2000,
			// 	"currency" => "cad",
			// 	"card" => "4242424242424242", // obtained with Stripe.js
			// 	"description" => "Charge for ella.jackson@example.com"
			//   ));$request->input('psw-repeat');
			return view('help',['page_name_active'=> 'help','test'=> $customer->id]);

		}
}
