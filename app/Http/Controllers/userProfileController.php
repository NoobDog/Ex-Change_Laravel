<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
class userProfileController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }
		public function index() {
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			\View::share(['page_name_active'=> 'home']);
            return \View::make('userProfile',['user' => $user]);
        }
}
