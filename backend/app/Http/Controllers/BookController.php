<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        // $books = Book::all(); // get data from DB
        return view('books.index'); // send to view
    }
}
