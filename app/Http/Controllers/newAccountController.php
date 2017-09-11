<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
