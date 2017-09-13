<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class newAccountController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }
		public function index() {
						\View::share(['page_name_active'=> 'newAccount']);

            return \View::make('newAccount');
        }

		public function checkValue(Request $request){

						 $inputEmail = $request->input('email');
						 $inputPassword = $request->input('psw');
						 $inputPasswordRepeat = $request->input('psw-repeat');
						 $inputFirstName = $request->input('fName');
						 $inputLastName = $request->input('lName');
						 if($inputPassword == $inputPasswordRepeat) {
							 $inputPasswordHashed = Hash::make($inputPassword);
							 $checkUser = DB::select('SELECT * FROM users WHERE userEmail = ? AND userPassword' , [$inputEmail , $inputPasswordHashed]);
							 return $checkUser;
						 } else {
							 return view('newAccount',['page_name_active'=>'newAccount']);

						 }


						 //return 'email: '.$inputEmail.' password:'.$inputPassword.' passwordRepeat: '.$inputPasswordRepeat.' firstName: '.$inputFirstName.' lastName:'.$inputLastName;

		}
}
