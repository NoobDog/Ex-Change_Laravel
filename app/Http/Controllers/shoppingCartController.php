<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
class shoppingCartController extends Controller
{

		public function index() {
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			\View::share(['page_name_active'=> 'cart']);
            return \View::make('shoppingCart',['user' => $user]);
		}
	
}
