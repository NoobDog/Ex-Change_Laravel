<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Stripe;
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
		public function stripe() {
			\Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
			$data = \Stripe\Charge::create(array(
				"amount" => 2000,
				"currency" => "cad",
				"source" => "tok_amex", // obtained with Stripe.js
				"description" => "Charge for ella.jackson@example.com"
			  ));
			  return view('help',['test'=> $data]);

		}
}
