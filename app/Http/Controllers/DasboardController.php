<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dasboard(){
        $data = Book::all();
        return view('dasboard',compact('data'));
    }
}
