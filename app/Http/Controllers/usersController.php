<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
use Stripe;
class usersController extends Controller
{

		public function index() {
            if (Session::get('roleTypeID') != 2) {
                return redirect()->route('home');
            }

            else {
                $users = DB::select('SELECT userName, userEmail, userIcon, roleTypeID, isWarning, isBlock, isVoid FROM users WHERE roleType = ?',[1]);
                $users = json_decode(json_encode($users),true);
                \View::share(['page_name_active'=> 'users']);
                return \View::make('users',['users' => $users]);
            }
		}
}
