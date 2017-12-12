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
        public function addMessage(Request $request) {
            $messageIndexs = $request -> messageIndexs;
            $bookID = $request -> bookID;
            $buyerID = $request -> buyerID;
            $message = $request -> message;
            $receiverID = $request -> receiverID;
            $sellerID = $request -> sellerID;
            $senderID = $request -> senderID;

            foreach ($messageIndexs as $key => $val) {
                // DB::update('UPDATE negotiate SET isRead = ? where negotiateID = ?', 
                // [1, $key -> id]);
                return $val;
            }

            // DB::insert('INSERT INTO negotiate (senderID, receiverID, bookID, message, date, isRead,
            // buyerID, sellerID)
            // values (?, ?, ?, ?, ?, ?, ?, ?)',
            // [$senderID,$receiverID,$bookID,$message,date("Y-m-d"),0,$buyerID,$sellerID]
            // );
            //return 'yes';

        }

}
