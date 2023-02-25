<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index($id)
    // {
    //     $book = Book::findOrFail($id);

    //     return view('index', compact('book'));
    // }
    public function index($id = null)
    {
        if ($id === null) {
            $books = Book::firstOrFail();
        } else {
            $books = Book::findOrFail($id);
        }
        return view('home', compact('books'));
    }
}
