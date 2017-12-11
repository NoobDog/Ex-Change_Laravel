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
                $messages = DB::select("SELECT CONCAT(u.userName, '_', b.bookName, '_', b.bookID) as ID, n.* , u.userName as senderName, u.userIcon as senderIcon FROM negotiate n 
                                            LEFT JOIN users u ON u.userID = n.senderID 
                                            LEFT JOIN books b ON n.bookID = b.bookID
                                            WHERE receiverID = ? AND isRead = ?",[Session::get('userID'), 0]);
                $messages = json_decode(json_encode($messages),true);
            } 
           return $messages;
        }


}
