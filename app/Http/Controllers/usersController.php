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

			$users = DB::select('SELECT * FROM users');
            $users = json_decode(json_encode($users),true);
			\View::share(['page_name_active'=> 'users']);
			return \View::make('users',['users' => $users]);
		}
}
