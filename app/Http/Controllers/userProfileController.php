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
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			return view('userProfile',['page_name_active'=> 'home','changePassword'=>'true','user' => $user]);
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
		public function updateUserProFile(Request $request) {
			$newUserName = $request->input('userName') ?? '';
			$newUserEmail = $request->input('userEmail') ?? '';
			$newUserBOD = $request->input('userBOD') ?? '';
			$newUserGender = $request->get('userGender') ?? '';

			DB::update('UPDATE users SET userName = ?, userEmail = ?, userBOD = ?, userGender = ? where userID = ?', 
				[$newUserName, $newUserEmail, $newUserBOD, $newUserGender, Session::get('userID')]);
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			return view('userProfile',['user' => $user,'page_name_active'=> 'home','successMsg' =>'Update Succeed!']);

		}
		public function pickImg() {
			$data = [
				'Book' => 'Book.png',
				'Cat' => 'Cat.png',
				'Dog' => 'Dog.png',
				'Mickey' => 'Mickey.jpg',
				'Minion' => 'Minion.png',
				'Josh' => 'Josh.png',
				'Mario' => 'Mario.png',
				'Pikachu' => 'Pikachu.png',
				'Chopper' => 'Chopper.png',
				'Niao' => 'Niao.jpg'
			];
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			return view('userProfile',['user' => $user,'page_name_active'=> 'home','isPicked' => true, 'imgs' => $data, 'user' => $user]);
		}
		public function updateUserIcon(Request $request) {
			$newUserIcon = $request->input('iconSelect') ?? '';
			DB::update('UPDATE users SET userIcon = ? where userID = ?', 
				[$newUserIcon, Session::get('userID')]);
			$user = DB::select('SELECT * FROM users WHERE userID = ?', [Session::get('userID')]);
			$user = json_decode(json_encode($user),true);
			$user = $user[0];
			return view('userProfile',['user' => $user,'page_name_active'=> 'home','successMsg' =>'Update Succeed!']);
		}
}
