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
		public function triggerAddNewBook() {
				 return view('myBooks',['page_name_active'=> 'myEx-change','getAddBookForm'=>'true']);
		}
		public function addNewBook(Request $request) {
				 $bookName = $request->input('bookName');
				 $bookTitle = $request->input('bookTitle');
				 $bookAuthor = $request->input('bookAuthor');
				 $bookDate = $request->input('bookDate');
				 $bookPublisher = $request->input('bookPublisher');
				 $bookEdition = $request->input('bookEdition');
				 $bookDescription = $request->input('bookDescription');

				 if( $request->hasFile('file') ) {
		        $imgFile =  $request->file('file');
		         // Now you have your file in a variable that you can do things with
	
							if(!File::exists(public_path('/users'))) {
							    // path does not exist
									$path = public_path().'/users/'.Session::get('userEmail');;
									File::mkdir($path);
									$imgFile->move($path);
							} else {
									$path = public_path().'/users/'.Session::get('userEmail');;
									$imgFile->move($path);
							}
		     }
				 return 'no';
		}


}
