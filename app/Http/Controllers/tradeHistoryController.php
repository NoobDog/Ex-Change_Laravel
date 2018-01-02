<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;
use Stripe;
class tradeHistoryController extends Controller
{

    public function index() {

            $trades = DB::select('SELECT * FROM trade WHERE userID = ?',[Session::get('userID')]);
            $trades = json_decode(json_encode($trades),true);
            \View::share(['page_name_active'=> 'myEx-change']);
            return \View::make('tradeHistory',['trades' => $trades]);

    }

}
