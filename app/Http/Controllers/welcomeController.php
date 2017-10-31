<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
class welcomeController extends Controller
{ 

		public function index() {
			$books = DB::select('select * from books');
			$books = json_decode(json_encode($books),true);
			\View::share(['page_name_active'=> 'home','books'=>$books]);
            return \View::make('welcome'); 
    }
        public function logout() {
          Session::flush();
    	    //return view('welcome' , ['page_name_active' => 'home']);
					return redirect()->route('home');
	}
	public function stripeTest() {
		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_pK6G4wvuLI8ASeRUKpuoz0zs");

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];

		// Charge the user's card:
		$charge = \Stripe\Charge::create(array(
		"amount" => 1000,
		"currency" => "cad",
		"description" => "Example charge",
		"source" => $token,
		));
	}

}
