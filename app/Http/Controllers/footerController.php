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

            foreach ($messageIndexs as $id) {
                DB::update('UPDATE negotiate SET isRead = ? where negotiateID = ?', 
                [1, $id]);
            }
            DB::insert('INSERT INTO negotiate (senderID, receiverID, bookID, message, date, isRead,
            buyerID, sellerID)
            values (?, ?, ?, ?, ?, ?, ?, ?)',
            [$senderID,$receiverID,$bookID,$message,date("Y-m-d"),0,$buyerID,$sellerID]
            );
            return 'yes';

        }
        public function addToCart(Request $request) {
            $bookID = $request -> bookID;
            if(Session::has('userID')) {
                $book = DB::select("SELECT * FROM books WHERE bookID = ?",[$bookID]);
                $book = json_decode(json_encode($book),true);
                $book = $book[0];
                if( $book['userID'] == Session::get('userID')) {
                    return 'sameUser';
                }
                DB::insert('INSERT INTO shoppingCart (userID, bookID, bookPrice, status, date)
                values (?, ?, ?, ?, ?)',
                [Session::get('userID'),$book['bookID'],$book['bookPrice'],'addCart',date("Y-m-d")]
                );
                return 'yes';
            } 
            return 'noUser';
        }

}
