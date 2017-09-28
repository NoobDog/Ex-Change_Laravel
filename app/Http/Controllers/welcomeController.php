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
			$books = DB::select('select * from books');
			$books = json_decode(json_encode($books),true);
			\View::share(['page_name_active'=> 'home','books'=>$books]);
            return \View::make('welcome'); 
    }
        public function logout() {
          Session::flush();
    	    //return view('welcome' , ['page_name_active' => 'home']);
					return redirect()->route('home');
    }

}
