<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dasboard(){
        return view('dasboard');
    }
}
