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
			$users = DB::select('SELECT userName, userEmail, userIcon, roleTypeID, isWarning, isBlock, isVoid FROM users WHERE roleTypeID = ?',[2]);
            $users = json_decode(json_encode($users),true);
			\View::share(['page_name_active'=> 'help']);
            return \View::make('help',['users'=> $users]);
		}

}
