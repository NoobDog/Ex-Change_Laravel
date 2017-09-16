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


Route::get('/',['as'=>'home','uses'=>'welcomeController@index']);

Route::get('/login','loginController@index');
Route::post('/login',['as'=>'loginPost','uses'=>'loginController@getUser']);
//forget password page.
Route::get('/login/forgetPassword',['as'=>'forgetPassword','uses'=>'loginController@forgetPassword']);
Route::post('/login/forgetPassword',['as'=>'forgetPassword_checkEmail','uses'=>'loginController@forgetPassword_checkEmail']);

Route::get('/newAccount','newAccountController@index');
Route::post('/newAccount',['as'=>'signUpCheck','uses'=>'newAccountController@checkValue']);
Route::get('/help','helpController@index');

Route::get('/logout',['as'=>'logout','uses'=>'welcomeController@logout']);
