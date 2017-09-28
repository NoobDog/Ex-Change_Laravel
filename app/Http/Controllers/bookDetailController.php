<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
class bookDetailController extends Controller
{ 

		public function index($book) {
			$book = DB::select('SELECT * FROM books WHERE bookID = ?',[$book]);
			$book = json_decode(json_encode($books),true);
            if(!empty($book)) {
                \View::share(['page_name_active'=> 'home','book'=>$book]);
                return \View::make('bookDetail'); 
            } else {
                return redirect()->route('home');
            }
           
    }


}
