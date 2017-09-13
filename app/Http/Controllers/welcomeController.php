<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class welcomeController extends Controller
{

		public function index() {
		    	 $users = DB::select('select * from dbo.users where userID = ?', [1]);
					 \View::share(['page_name_active'=> 'home']);
           $users = json_decode(json_encode($users),true);
           return \View::make('welcome')->with('name',$users[0]['userName']);
    }
}