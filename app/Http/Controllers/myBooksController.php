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
           return \View::make('myBooks');
    }


}
