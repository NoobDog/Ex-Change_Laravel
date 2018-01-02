<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
class bookDetailController extends Controller
{ 

    public function index($bookID) {
        if (strpos($bookID, '_') !== false) {
            $array = explode ("_", $bookID);
            $bookID = $array[0];
            $refresh = $array[1];
        } else {
            $refresh = 'false';
        }
        $book = DB::select('SELECT * FROM books WHERE bookID = ?',[$bookID]);
        $book = json_decode(json_encode($book),true);
        
        if(!empty($book)) {
            $bookType = DB::select('SELECT typeName FROM bookTypes WHERE typeID = ?',[$book[0]['bookTypeID']]);
            $bookType = json_decode(json_encode($bookType),true);

            $bookUser = DB::select('SELECT userName, userIcon FROM users WHERE userID = ?',[$book[0]['userID']]);
            $bookUser = json_decode(json_encode($bookUser),true);
            
            $book[0]['bookType'] = $bookType[0]['typeName'];
            $book[0]['bookUserName'] = $bookUser[0]['userName'];
            $book[0]['bookUserIcon'] = $bookUser[0]['userIcon'];
            if(Session::has('userID')) {
                $messages = DB::select('SELECT * FROM negotiate WHERE sellerID = ? AND buyerID = ? AND bookID = ?',[$book[0]['userID'], Session::get('userID'), $book[0]['bookID']]);
                $messages = json_decode(json_encode($messages),true);
                //Session::get('userEmail')
                \View::share(['page_name_active'=> 'home','book'=>$book[0], 'messages' => $messages, 'refresh'=>$refresh]);
            } else {
                \View::share(['page_name_active'=> 'home','book'=>$book[0],'refresh'=>$refresh]);
            }
            return \View::make('bookDetail'); 
        } else {
            return redirect()->route('home');
        }
           
    }
    public function bookDetailAddMessage($book,Request $request) {
        $bookID = $book;
        $senderID = $request->input('senderID');
        $receiverID = $request->input('receiverID');
        $sellerID = $request->input('sellerID');
        $buyerID = $request->input('buyerID');
        $message = $request->input('message');

        DB::insert('INSERT INTO negotiate (senderID, receiverID, bookID, message, date, isRead,
            buyerID, sellerID)
            values (?, ?, ?, ?, ?, ?, ?, ?)',
            [$senderID,$receiverID,$bookID,$message,date("Y-m-d"),0,$buyerID,$sellerID]
        );
        $refresh = 'true';
        return redirect()->route('bookDetail', $bookID.'_'.$refresh);

    }
    public function bookDetailAdminEdit($book,Request $request) {
        $isVoid = $request->input('isVoid') ?? 0;
        DB::update('UPDATE books SET isVoid = ? where bookID = ?', [$isVoid, $book]);
        return redirect()->route('bookDetail',$book);
    }


}
