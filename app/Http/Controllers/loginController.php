<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
				 //$users = DB::select('select * from dbo.users where userName = ?', [$name]);

				//  if (Hash::check('haha', $passwordHashed)) {
				//      return 'yesssss';
				//  }
				 //return view('login')->with('name',$name);
				 return 'User: '.$inputEmail.' hashedPassword:'.$inputPasswordHashed;
		}
}
