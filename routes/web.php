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
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
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

Route::get('/myBooks/{book}',['as'=>'bookEdit','uses'=>'myBooksController@bookEdit']);
Route::post('/myBooks/{book}',['as'=>'updateUserBook','uses'=>'myBooksController@updateUserBook']);

//loutout
Route::get('/logout',['as'=>'logout','uses'=>'welcomeController@logout']);
//book detail
Route::get('/bookDetail/{book}',['as'=>'bookDetail','uses'=>'bookDetailController@index']);

Route::post('/bookDetail/{book}',['as'=>'bookDetailAddMessage','uses'=>'bookDetailController@bookDetailAddMessage']);

Route::post('/bookDetail/edit/{book}',['as'=>'bookDetailAdminEdit','uses'=>'bookDetailController@bookDetailAdminEdit']);

//user profile page.
Route::get('/userProfile',['as'=>'userProfile','uses'=>'userProfileController@index']);
Route::get('/userProfile/newPassword',['as'=>'changePassword','uses'=>'userProfileController@changePassword']);
Route::post('/userProfile/newPassword',['as'=>'setNewPassword','uses'=>'userProfileController@setNewPassword']);
Route::post('/userProfile',['as'=>'updateUserProFile','uses'=>'userProfileController@updateUserProFile']);
Route::get('/userProfile/pickIcons',['as'=>'pickImg','uses'=>'userProfileController@pickImg']);
Route::post('/userProfile/pickIcons',['as'=>'updateUserIcon','uses'=>'userProfileController@updateUserIcon']);

//general page.
Route::get('/general',['as'=>'general','uses'=>'generalController@index']);
//privacy setting page.
Route::get('/privacySetting',['as'=>'privacySetting','uses'=>'privacySettingController@index']);
//address setting page.
Route::get('/addressSetting',['as'=>'addressSetting','uses'=>'addressSettingController@index']);
Route::post('/addressSetting',['as'=>'addAddress','uses'=>'addressSettingController@addAddress']);

// Route::post('/help',['as'=>'stripe','uses'=>'helpController@stripe']);
//shopping cart
Route::get('/shoppingCart',['as'=>'shoppingCart','uses'=>'shoppingCartController@index']);
Route::post('/shoppingCart',['as'=>'addCardAndCheckOut','uses'=>'shoppingCartController@addCardAndCheckOut']);
Route::get('/shoppingCart/checkOut',['as'=>'checkOut','uses'=>'shoppingCartController@checkOut']);
Route::get('/shoppingCart/delete/{ID}',['as'=>'deleteCartItem','uses'=>'shoppingCartController@deleteCartItem']);

//banks
Route::get('/myBanks','bankController@index');
Route::post('/myBanks/addCard',['as'=>'addCard', 'uses'=>'bankController@addCard']);
Route::post('/myBanks/editCard',['as'=>'editCard', 'uses'=>'bankController@editCard']);
//footer
Route::post('/footer',['as'=>'chatMessages','uses'=>'footerController@index']);
Route::post('/footer/addMessage',['as'=>'addMessage','uses'=>'footerController@addMessage']);
Route::post('/footer/addToCart',['as'=>'addToCart','uses'=>'footerController@addToCart']);

//users
Route::get('/allUsers',['as'=>'users','uses'=>'usersController@index']);
Route::post('/allUsers/{userEmail}',['as'=>'updateUserStatus','uses'=>'usersController@updateUserStatus']);
//tradeHistory
Route::get('/tradeHistory',['as'=>'tradeHistory','uses'=>'tradeHistoryController@index']);

//game
Route::get('/game',['as'=>'game','uses'=>'gameController@index']);


//weChat
Route::get('/weChat',['as'=>'weChat','uses'=>'weChatController@saveToDataBase']);
