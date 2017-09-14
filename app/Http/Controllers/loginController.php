<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class loginController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }
		public function index() {
						\View::share(['page_name_active'=> 'login']);

            return \View::make('login');
        }
		public function getUser(Request $request) {
			\View::share(['page_name_active'=> 'login']);

				 $inputEmail = $request->input('userEmail');
				 $inputPasswordHashed = Hash::make($request->input('passWord'));
				 return md5($request->input('passWord'));
				 $user = DB::select('SELECT * FROM users WHERE userEmail = ? AND userPassword = ?', [$inputEmail,$inputPasswordHashed]);
				 if(!empty($user)) {
					 $user = json_decode(json_encode($user),true);
					 Session::put('userName' , $user[0]['userName']);
					 Session::put('userEmail' , $user[0]['userEmail']);
					 Session::put('roleTypeID' , $user[0]['roleTypeID']);
					 return view('welcome' , ['page_name_active' => 'welcome' , 'name' => Session::get('userName')]);
				 } else {
					   return view('login',['page_name_active'=> 'login']);
				 }

		}
}
