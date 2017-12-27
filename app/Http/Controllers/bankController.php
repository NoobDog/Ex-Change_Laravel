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
            $userCard = json_decode(json_encode($userCard),true);
			// \View::share(['page_name_active'=> 'myEx-change']);

			// \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

			// $test = \Stripe\Balance::retrieve();

			return \View::make('bank',['userCard' => $userCard]);
		}
}
