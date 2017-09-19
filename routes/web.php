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
Route::get('/myBooks/addNewBook',['as'=>'getAddBookForm', 'uses'=>'myBooksController@addNewBook']);
//loutout
Route::get('/logout',['as'=>'logout','uses'=>'welcomeController@logout']);
