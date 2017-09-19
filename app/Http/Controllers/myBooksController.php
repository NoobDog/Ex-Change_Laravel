<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
class myBooksController extends Controller
{

		public function index() {
			 \View::share(['page_name_active'=> 'myEx-change']);
			 $user = DB::select('SELECT userID FROM users WHERE userEmail = ?', [Session::get('userEmail')]);
 			 $user = json_decode(json_encode($user),true);
			 $userID = $user[0]['userID'];
			 $userBooks = DB::select('SELECT * FROM books WHERE userID = ?', [$userID]);
			 $userBooks = json_decode(json_encode($userBooks),true);
       return \View::make('myBooks',['userBooks' => $userBooks]);
    }
		public function addNewBook($addBook = null) {
			if($addBook == null) {
				 return view('myBooks',['page_name_active'=> 'myEx-change','getAddBookForm'=>'true']);
			} else {
				return $addBook;
			}

		}


}
