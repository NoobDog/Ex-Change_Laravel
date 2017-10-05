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
                $book[0]['bookType'] = $bookType['typeName'];
                \View::share(['page_name_active'=> 'home','book'=>$book[0]]);
                return \View::make('bookDetail'); 
            } else {
                return redirect()->route('home');
            }
           
    }


}
