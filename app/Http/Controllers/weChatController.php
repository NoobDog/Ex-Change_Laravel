<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
class weChatController extends Controller
{ 

		public function saveToDataBase(Request $request) {
      return 'test';
      $name = $request->input('userName') ?? '';
      $country = $request->input('userCountry') ?? '';
      $IP = $request->input('userIP') ?? '';
      try {
        DB::insert(
          'INSERT INTO weChat (userName, userCountry, userIP) values (?, ?, ?)',
          [$name, $country, $IP]
        );
        return 'Got it~';
      }
      catch (Exception $e) {
					// Something else happened, completely unrelated to Stripe
					$body = $e->getJsonBody();
          $err  = $body['error'];
          return $err;
      }

    }


}
