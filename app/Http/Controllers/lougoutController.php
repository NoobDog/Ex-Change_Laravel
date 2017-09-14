<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
class welcomeController extends Controller
{

	Session::forget('userName');
	Session::forget('userEmail');
	Session::forget('roleTypeID');
	Session::flush();
	return view('welcome' , ['page_name_active' => 'home']);

}
