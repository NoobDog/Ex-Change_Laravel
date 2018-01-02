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
            
            return $expiryYear;
        }

        public function editCard() {
			$nameOnCard = $request->input('nameOnCard');
			$cardNumber = $request->input('cardNumber');
			$cvv = $request->input('cvv');
			$expiryYear = $request->input('expiryYear');
            $expiryMonth = $request->get('expiryMonth');
            
            return $expiryYear;
        }
}
