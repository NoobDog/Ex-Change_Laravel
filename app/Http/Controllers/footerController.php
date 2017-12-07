<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
class footerController extends Controller
{ 

		public function index() {
			// $book = DB::select('SELECT * FROM books WHERE bookID = ?',[$book]);
            // $book = json_decode(json_encode($book),true);
            // if(!empty($book)) {
            //     $bookType = DB::select('SELECT typeName FROM bookTypes WHERE typeID = ?',[$book[0]['bookTypeID']]);
            //     $bookType = json_decode(json_encode($bookType),true);
            //     $book[0]['bookType'] = $bookType[0]['typeName'];
            //     \View::share(['page_name_active'=> 'home','book'=>$book[0]]);
            //     return \View::make('bookDetail'); 
            // } else {
            //     return redirect()->route('home');
            // }
            if(Session::has('userID')) {
                $messages = DB::select('SELECT * FROM negotiate WHERE receiverID = ? AND isRead = ?',[Session::get('userID'), 0]);
                $messages = json_decode(json_encode($messages),true);

            } 
           return $messages;
        }


}
