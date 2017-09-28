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


           return $book; 
    }


}
