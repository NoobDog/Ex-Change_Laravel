<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
class shoppingCartController extends Controller
{

		public function index() {
			$shoppingCart = DB::select('SELECT sc.*, b.bookTitle, b.bookImage, b.bookName, b.bookDescription FROM shoppingCart sc LEFT JOIN books b ON b.bookID = sc.bookID WHERE sc.userID = ?', [Session::get('userID')]);
			$shoppingCart = json_decode(json_encode($shoppingCart),true);

			\View::share(['page_name_active'=> 'cart']);
            return \View::make('shoppingCart',['shoppingCart' => $shoppingCart]);
		}
	
}
