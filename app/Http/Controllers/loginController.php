<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
class loginController extends Controller
{

		public function index() {
						\View::share(['page_name_active'=> 'login']);

            return \View::make('login');
        }
		public function getUser(Request $request) {
			\View::share(['page_name_active'=> 'login']);

				 $inputEmail = $request->input('userEmail');
				 $inputPasswordHashed = md5($request->input('passWord'));
				 $user = DB::select('SELECT * FROM users WHERE userEmail = ? AND userPassword = ?', [$inputEmail,$inputPasswordHashed]);
				 if(!empty($user)) {
					 $user = json_decode(json_encode($user),true);
					 Session::put('userID' , $user[0]['userID']);
					 Session::put('userName' , $user[0]['userName']);
					 Session::put('userEmail' , $user[0]['userEmail']);
					 Session::put('roleTypeID' , $user[0]['roleTypeID']);
					 //return view('welcome' , ['page_name_active' => 'home' , 'name' => Session::get('userName')]);
					 return redirect()->route('home');
				 } else {
					   return view('login',['page_name_active'=> 'login','loginError'=>'Account or Password is wrong, please login again.']);
				 }

		}
		public function forgetPassword() {
				return view('login',['page_name_active'=> 'login','forgetPassword'=>'true']);
		}
		public function forgetPassword_checkEmail(Request $request) {
			$inputEmail = $request->input('forgetPassword_Email');
			$user = DB::select('SELECT * FROM users WHERE userEmail = ?', [$inputEmail]);
			if(!empty($user)) {
				$user = json_decode(json_encode($user),true);
				$userQuestion1 = $user[0]['userQuestion1'];
				$userAnswer1 = $user[0]['userAnswer1'];
				$userQuestion2 = $user[0]['userQuestion2'];
				$userAnswer2 = $user[0]['userAnswer2'];
				return view('login',['page_name_active'=> 'login','forgetPassword_securityQuestion'=>'true','userQuestion1'=>$userQuestion1,'userQuestion2'=>$userQuestion2,'userEmail'=>$inputEmail]);

			} else {
				 return view('login',['page_name_active'=> 'login','forgetPassword'=>'true','userErrorMsg'=>'The user does not exist.']);
			}

		}
		public function forgetPassword_checkSecurityQuestions(Request $request , $userEmail) {
			$inputAnswer1 = strtolower($request->input('forgetPassword_Answer1'));
			$inputAnswer2 = strtolower($request->input('forgetPassword_Answer2'));
			$user = DB::select('SELECT * FROM users WHERE userEmail = ?', [$userEmail]);
			$user = json_decode(json_encode($user),true);
			$userAnswer1 = strtolower($user[0]['userAnswer1']);
			$userAnswer2 = strtolower($user[0]['userAnswer2']);
			$userQuestion1 = $user[0]['userQuestion1'];
			$userQuestion2 = $user[0]['userQuestion2'];
			if($inputAnswer1 == $userAnswer1 && $inputAnswer2 == $userAnswer2) {

				return view('login',['page_name_active'=> 'login','forgetPassword_setPassword'=>'true','userEmail'=>$userEmail]);

			} elseif($inputAnswer1 != $userAnswer1 && $inputAnswer2 != $userAnswer2) {

				return view('login',['page_name_active'=> 'login','forgetPassword_securityQuestion'=>'true','question1Error'=>'The answer is not correct.',
						'question2Error'=>'The answer is not correct.','userEmail'=>$userEmail,'userQuestion1'=>$userQuestion1,'userQuestion2'=>$userQuestion2]);

			} elseif($inputAnswer1 == $userAnswer1 && $inputAnswer2 != $userAnswer2) {

				return view('login',['page_name_active'=> 'login','forgetPassword_securityQuestion'=>'true',
				'question2Error'=>'The answer is not correct.','userEmail'=>$userEmail,'userQuestion1'=>$userQuestion1,'userQuestion2'=>$userQuestion2]);

			} elseif($inputAnswer1 != $userAnswer1 && $inputAnswer2 == $userAnswer2) {

				return view('login',['page_name_active'=> 'login','forgetPassword_securityQuestion'=>'true',
				'question1Error'=>'The answer is not correct.','userEmail'=>$userEmail,'userQuestion1'=>$userQuestion1,'userQuestion2'=>$userQuestion2]);

			}
		}
		public function forgetPassword_setPassword(Request $request, $userEmail) {
			$newPassword = $request->input('passWord');
			$newPasswordHashed = md5($newPassword);
			DB::update('UPDATE users SET userPassword = ? where userEmail = ?', [$newPasswordHashed, $userEmail]);
			$user = DB::select('SELECT * FROM users WHERE userEmail = ?', [$userEmail]);
			$user = json_decode(json_encode($user),true);
			Session::put('userID' , $user[0]['userID']);
			Session::put('userName' , $user[0]['userName']);
			Session::put('userEmail' , $user[0]['userEmail']);
			Session::put('roleTypeID' , $user[0]['roleTypeID']);
			return redirect()->route('home');
		}

}
