<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
//use Stripe;
//home page
Route::get('/',['as'=>'home','uses'=>'welcomeController@index']);
//login
Route::get('/login','loginController@index');
Route::post('/login',['as'=>'loginPost','uses'=>'loginController@getUser']);
//forget password page.
Route::get('/login/forgetPassword',['as'=>'forgetPassword','uses'=>'loginController@forgetPassword']);
Route::post('/login/forgetPassword',['as'=>'forgetPassword_checkEmail','uses'=>'loginController@forgetPassword_checkEmail']);
Route::post('/login/forgetPassword/{userEmail}',['as'=>'forgetPassword_checkSecurityQuestions','uses'=>'loginController@forgetPassword_checkSecurityQuestions']);
Route::post('/login/forgetPassword/{userEmail}/newPassword',['as'=>'forgetPassword_setPassword','uses'=>'loginController@forgetPassword_setPassword']);
//new account page.
Route::get('/newAccount','newAccountController@index');
Route::post('/newAccount',['as'=>'signUpCheck','uses'=>'newAccountController@checkValue']);
//help page.
Route::get('/help','helpController@index');
//my books page.
Route::get('/myBooks','myBooksController@index');
Route::get('/myBooks/addNewBook',['as'=>'getAddBookForm', 'uses'=>'myBooksController@triggerAddNewBook']);
Route::post('/myBooks/addNewBook',['as'=>'postAddBookForm', 'uses'=>'myBooksController@addNewBook']);
//loutout
Route::get('/logout',['as'=>'logout','uses'=>'welcomeController@logout']);
//book detail
Route::get('/bookDetail/{book}',['as'=>'bookDetail','uses'=>'bookDetailController@index']);
//user profile page.
Route::get('/userProfile',['as'=>'userProfile','uses'=>'userProfileController@index']);
//general page.
Route::get('/general',['as'=>'general','uses'=>'generalController@index']);
//privacy setting page.
Route::get('/privacySetting',['as'=>'privacySetting','uses'=>'privacySettingController@index']);
//address setting page.
Route::get('/addressSetting',['as'=>'addressSetting','uses'=>'addressSettingController@index']);



Route::post ( '/help', function (Request $request) {
	\Stripe\Stripe::setApiKey ( env('STRIPE_SECRET') );
	try {
		\Stripe\Charge::create ( array (
				"amount" => 300 * 100,
				"currency" => "usd",
				"source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
				"description" => "Test payment." 
		) );
		Session::flash ( 'success-message', 'Payment done successfully !' );
		return Redirect::back ();
	} catch ( \Exception $e ) {
		Session::flash ( 'fail-message', "Error! Please Try again." );
		return Redirect::back ();
	}
} );