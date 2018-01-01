<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
class welcomeController extends Controller
{ 

		public function index() {
			$books = DB::select('SELECT * from books WHERE isVoid = ? AND private = ? AND sold IS NULL',[0, 0]);
			$books = json_decode(json_encode($books),true);
			if(Session::has('userID')) {
				$messages = DB::select('SELECT * FROM negotiate WHERE receiverID = ? AND isRead = ?',[Session::get('userID'), 0]);
				$messages = json_decode(json_encode($messages),true);
				\View::share(['page_name_active'=> 'home','books'=>$books, 'messages'=>$messages]);
				return \View::make('welcome'); 
			}
			\View::share(['page_name_active'=> 'home','books'=>$books]);
            return \View::make('welcome'); 
    }
        public function logout() {
          	Session::flush();
    	    //return view('welcome' , ['page_name_active' => 'home']);
			return redirect()->route('home');
	}

}
