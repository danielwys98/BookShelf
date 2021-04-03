<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $books = Book::all();
        return view('dashboard',compact('books'));
    }


    public function create()
    {
        return view('newBooks');
    }


    public function store(Request $request)
    {
        $book = new Book;
        $user=Auth::user();

        $book->user_id = $user->id;
        $book->book_title= $request->book_title;
        $book->book_author= $request->book_author;
        $book->book_chapter= $request->book_chapter;
        $book->book_category= $request->book_category;
        $book->book_hasCompleted = 0;
        $book->book_isDone= 0;

        $book->save();

        return redirect(route('dashboard'));

    }

    public function edit()
    {
        return view('editBooks');
    }

    public function update(Request $request,$id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
