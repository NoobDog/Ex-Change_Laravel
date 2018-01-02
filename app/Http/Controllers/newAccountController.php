<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Stripe;
use Illuminate\Http\RedirectResponse;
class newAccountController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }

		public function getQuestions() {
			$questions[1] = [
				1=>"What is your first pet name ?",
				2=>"What is your favorite color ?",
				3=>"What is your father's first name ?",
				4=>"What is your mother's first name ?"
			];
			$questions[2] = [
				1=>"What is your favorite song ?",
				2=>"What is your favorite food ?",
				3=>"What is your favorite sport ?",
				4=>"What is your favorite movie ?"
			];
			return $questions;
		}


		public function index() {
						\View::share(['page_name_active'=> 'newAccount']);
						$quetions = self::getQuestions();
            return \View::make('newAccount',['questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
        }

		public function checkValue(Request $request){
						 $quetions = self::getQuestions();
						 $inputEmail = $request->input('email');
						 $inputPassword = $request->input('psw');
						 $inputPasswordRepeat = $request->input('psw-repeat');
						 $inputFirstName = $request->input('fName');
						 $inputLastName = $request->input('lName');
						 $inputQuestionIndex1 = $request->get('questionSelect1');
						 $inputQuestionIndex2 = $request->get('questionSelect2');
						 $inputQuestion1 = $quetions[1][$inputQuestionIndex1];
						 $inputQuestion2 = $quetions[2][$inputQuestionIndex2];
						 $inputAnswer1 = $request->input('question1');
						 $inputAnswer2 = $request->input('question2');

						 if($inputPassword == $inputPasswordRepeat) {
							 $inputPasswordHashed = md5($inputPassword);
							 $checkUser = DB::select('SELECT * FROM users WHERE userEmail = ?' , [$inputEmail]);
							 if(empty($checkUser)) {
								 $newUserName = $inputFirstName.' '.$inputLastName;
								try {
									$newAccount = \Stripe\Account::create(array(
										"type" => "standard",
										"country" => "CA",
										"email" =>  $inputEmail
									 ));
										 DB::insert('INSERT INTO users (userName, userPassword, userEmail, adminID, userIP, userIcon,
											isWarning, isBlock, isVoid, roleTypeID, userQuestion1, userAnswer1, userQuestion2, userAnswer2, userSince, stripeAccount)
											values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
											[$newUserName,$inputPasswordHashed,$inputEmail,0,'::1','0.jpg',0,0,0,1,$inputQuestion1,$inputAnswer1,
											 $inputQuestion2,$inputAnswer2,date("Y-m-d"), $newAccount['id']]
										);
										$user = DB::select('SELECT * FROM users WHERE userEmail = ? AND userPassword = ?', [$inputEmail, $inputPasswordHashed]);
										$user = json_decode(json_encode($user),true);
										Session::put('userID' , $user[0]['userID']);
										Session::put('userName', $user[0]['userName']);
										Session::put('userEmail', $user[0]['userEmail']);
										Session::put('roleTypeID', $user[0]['roleTypeID']);
										Session::put('userIcon' , $user[0]['userIcon']);
								}catch(\Stripe\Error\Card $e) {
									// Since it's a decline, \Stripe\Error\Card will be caught
									$body = $e->getJsonBody();
									$err  = $body['error'];
									
									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								} catch (\Stripe\Error\InvalidRequest $e) {
									// Invalid parameters were supplied to Stripe's API
									$body = $e->getJsonBody();
									$err  = $body['error'];

									
									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								} catch (\Stripe\Error\Authentication $e) {
									// Authentication with Stripe's API failed
									// (maybe you changed API keys recently)
									$body = $e->getJsonBody();
									$err  = $body['error'];

									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								} catch (\Stripe\Error\ApiConnection $e) {
									// Network communication with Stripe failed
									$body = $e->getJsonBody();
									$err  = $body['error'];

									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								} catch (\Stripe\Error\Base $e) {
									// Display a very generic error to the user, and maybe send
									// yourself an email
									$body = $e->getJsonBody();
									$err  = $body['error'];

									
									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								} catch (Exception $e) {
									// Something else happened, completely unrelated to Stripe
									$body = $e->getJsonBody();
									$err  = $body['error'];

									return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>$err,'questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
								}

									//return view('welcome' , ['page_name_active' => 'home','name' => Session::get('userName')]);
									return redirect()->route('home');
							 } else {
								 return view('newAccount',['page_name_active'=>'newAccount','errorMsg'=>'This user is already existed!','questions_1'=>$quetions[1],'questions_2'=>$quetions[2]]);
							 }

						 } else {
							 return view('newAccount',['page_name_active'=>'newAccount','questions_1'=>$quetions[1],'questions_2'=>$quetions[2],'errorMsg'=>'test!!']);

						 }

		}
}
