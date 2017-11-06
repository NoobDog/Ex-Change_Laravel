<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
class userProfileController extends Controller
{

		public function index() {
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			\View::share(['page_name_active'=> 'home']);
            return \View::make('userProfile',['user' => $user]);
		}
		public function changePassword() {
			return view('login',['page_name_active'=> 'home','changePassword'=>'true']);
		}
		public function setNewPassword(Request $request) {
			$newPassword = $request->input('passWord');
			$newPasswordHashed = md5($newPassword);
			DB::update('UPDATE users SET userPassword = ? where userID = ?', [$newPasswordHashed, Session::get('userID')]);
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
            return view('userProfile',['user' => $user,'page_name_active'=> 'home']);

		}
}
