<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
	// public function __construct()
	// {
	// 	View::share(['page_name_active'=> 'mypagename']);
	// }
		public function index() {
						\View::share(['page_name_active'=> 'home']);
            $name = array('a'=>'welcome','b'=>'yoyo');
            return \View::make('welcome')->with('name',$name);
        }
}
