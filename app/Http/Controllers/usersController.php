<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
use Stripe;
class usersController extends Controller
{

    public function index() {
        if (Session::get('roleTypeID') != 2) {
            return redirect()->route('home');
        }

        else {
            $users = DB::select('SELECT userName, userEmail, userIcon, roleTypeID, isWarning, isBlock, isVoid FROM users WHERE roleTypeID = ?',[1]);
            $users = json_decode(json_encode($users),true);
            \View::share(['page_name_active'=> 'users']);
            return \View::make('users',['users' => $users]);
        }
    }
    public function updateUserStatus(Request $request, $userEmail) {
        $status = $request->input('status') ?? '';
        if($status == "Void") {
            $Void = 1;
            $Warning = 0;
        } else if ($status == "Warning") {
            $Void = 0;
            $Warning = 1; 
        } else {
            $Void = 0;
            $Warning = 0;  
        }
        DB::update('UPDATE users SET isVoid = ?, isWarning = ? where userEmail = ?', [$Void, $Warning, $userEmail]);
        return redirect()->route('users');

    }
}
