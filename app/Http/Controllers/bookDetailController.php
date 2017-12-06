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
            $book = json_decode(json_encode($book),true);
            
            if(!empty($book)) {
                $bookType = DB::select('SELECT typeName FROM bookTypes WHERE typeID = ?',[$book[0]['bookTypeID']]);
                $bookType = json_decode(json_encode($bookType),true);

                $bookUser = DB::select('SELECT userName, userIcon FROM users WHERE userID = ?',[$book[0]['userID']]);
                $bookUser = json_decode(json_encode($bookUser),true);
                
                $book[0]['bookType'] = $bookType[0]['typeName'];
                $book[0]['bookUserName'] = $bookUser[0]['userName'];
                $book[0]['bookUserIcon'] = $bookUser[0]['userIcon'];
                \View::share(['page_name_active'=> 'home','book'=>$book[0]]);
                return \View::make('bookDetail'); 
            } else {
                return redirect()->route('home');
            }
           
    }


}
