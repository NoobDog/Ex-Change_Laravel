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
            $messages = 'null';
            if(Session::has('userID')) {
                $messages = DB::select("SELECT CONCAT(u.userName, '_', n.bookID) as ID, n.* , u.userName as senderName, u.userIcon as senderIcon FROM negotiate n LEFT JOIN users u ON u.userID = n.senderID WHERE receiverID = ? AND isRead = ?",[Session::get('userID'), 0]);
                $messages = json_decode(json_encode($messages),true);
            } 
           return $messages;
        }


}
