<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
class gameController extends Controller
{
    public function index() {
        return \View::make('test');
    }

}
