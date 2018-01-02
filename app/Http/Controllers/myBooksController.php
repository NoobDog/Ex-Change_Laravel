<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
class myBooksController extends Controller
{

		public function index() {
			 if(Session::has('userEmail')) {
				\View::share(['page_name_active'=> 'myEx-change']);
				$user = DB::select('SELECT userID FROM users WHERE userEmail = ?', [Session::get('userEmail')]);
				$user = json_decode(json_encode($user),true);
				$userID = $user[0]['userID'];
				$userBooks = DB::select('SELECT * FROM books WHERE userID = ?', [$userID]);
				$userBooks = json_decode(json_encode($userBooks),true);
				return \View::make('myBooks',['userBooks' => $userBooks]);
			 }
			 else {
				return redirect()->route('home');
			 }

		}
		public function triggerAddNewBook() {

			$bookTypes = DB::select('SELECT * FROM bookTypes');
			$bookTypes = json_decode(json_encode($bookTypes),true);
			return view('myBooks',['page_name_active'=> 'myEx-change','getAddBookForm'=>'true','bookTypes'=>$bookTypes]);
		}
		public function addNewBook(Request $request) {
				 $bookName = $request->input('bookName') ?? '';
				 $bookTitle = $request->input('bookTitle') ?? '';
				 $bookType = $request->get('bookType') ?? '';
				 $bookAuthor = $request->input('bookAuthor') ?? '';
				 $bookDate = $request->input('bookDate') ?? '';
				 $bookPublisher = $request->input('bookPublisher') ?? '';
				 $bookEdition = $request->input('bookEdition') ?? '';
				 $bookDescription = $request->input('bookDescription') ?? '';
				 $imgFile =  $request->file('file') ?? '';
				 $bookPrice = $request->input('bookPrice') ?? 0;
				 $bookPoint = $request->input('bookPoint') ?? 0;
				 $userID = Session::get('userID');
				 if( $request->hasFile('file') ) {
		        $imgFile =  $request->file('file');
							if(!File::exists(public_path('/users/'.Session::get('userEmail')))) {
							    // path does not exist
									$path = public_path().'/users/'.Session::get('userEmail');
									File::makeDirectory($path, 0777, true);
									$imgFile->move($path,$imgFile->getClientOriginalName());
									$imgPath = Session::get('userEmail').'/'.$imgFile->getClientOriginalName();
									//insert to books table
									DB::insert('INSERT INTO books (userID, bookName, bookTypeID, bookTitle, bookPublisher, bookAuthor, bookEdition, bookDate,
										bookImage, bookPrice, enableUserPoint, bookPoint, isVoid, private, bookDescription, sold)
										values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
										[$userID, $bookName, $bookType, $bookTitle, $bookPublisher, $bookAuthor, $bookEdition, $bookDate, $imgPath,
											$bookPrice, 0, 0, 0, 0, $bookDescription, 0]
									);

							} else {
									$path = public_path().'/users/'.Session::get('userEmail');
									$imgFile->move($path,$imgFile->getClientOriginalName());
									$imgPath = Session::get('userEmail').'/'.$imgFile->getClientOriginalName();
									//insert to books table
									DB::insert('INSERT INTO books (userID, bookName, bookTypeID, bookTitle, bookPublisher, bookAuthor, bookEdition, bookDate,
										bookImage, bookPrice, enableUserPoint, bookPoint, isVoid, private, bookDescription, sold)
										values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
										[$userID, $bookName, $bookType, $bookTitle, $bookPublisher, $bookAuthor, $bookEdition, $bookDate, $imgPath,
											$bookPrice, 0, 0, 0, 0, $bookDescription, 0]
									);
							}
		     } else {
					 $imgPath = 'unavailable.jpg';
					 //insert to books table
					 DB::insert('INSERT INTO books (userID, bookName, bookTypeID, bookTitle, bookPublisher, bookAuthor, bookEdition, bookDate,
						 bookImage, bookPrice, enableUserPoint, bookPoint, isVoid, private, bookDescription, sold)
						 values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
						 [$userID, $bookName, $bookType, $bookTitle, $bookPublisher, $bookAuthor, $bookEdition, $bookDate, $imgPath,
							 $bookPrice, 0, 0, 0, 0, $bookDescription, 0]
					 );
				}
				return $this->index();
		}

		public function bookEdit($book) {
			$userBook = DB::select('SELECT * FROM books WHERE bookID = ?', [$book]);
			$userBook = json_decode(json_encode($userBook),true);
			$userBook = $userBook[0];
			$bookTypes = DB::select('SELECT * FROM bookTypes');
			$bookTypes = json_decode(json_encode($bookTypes),true);
			//return $book;
			return view('myBooks',['page_name_active'=> 'myEx-change','getEditBookForm'=>'true','userBook'=>$userBook, 'bookTypes' =>$bookTypes]);

		}
		public function updateUserBook(Request $request, $book) {
			$bookName = $request->input('bookName') ?? '';
			$bookTitle = $request->input('bookTitle') ?? '';
			$bookType = $request->get('bookType') ?? '';
			$bookAuthor = $request->input('bookAuthor') ?? '';
			$bookDate = $request->input('bookDate') ?? '';
			$bookPublisher = $request->input('bookPublisher') ?? '';
			$bookEdition = $request->input('bookEdition') ?? '';
			$bookDescription = $request->input('bookDescription') ?? '';
			$bookPrice = $request->input('bookPrice') ?? 0;

			DB::update('UPDATE books SET bookName = ?, bookTitle = ?, bookTypeID = ?, bookAuthor = ?, bookDate = ?,
				bookPublisher = ?, bookEdition = ?, bookDescription = ?, bookPrice = ? where bookID = ?', 
				[$bookName, $bookTitle, $bookType, $bookAuthor, $bookDate, $bookPublisher, $bookEdition, $bookDescription, $bookPrice, $book]);
				
			return $this->index();
		}


}
