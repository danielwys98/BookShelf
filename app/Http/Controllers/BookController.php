<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user=Auth::user()->id;
        $books = Book::where('user_id',$user)->get();
        return view('dashboard',compact('books'));
    }


    public function create()
    {
        return view('newBooks');
    }


    public function store(Request $request)
    {
        //custom validation messages
        $custom=[
            'book_title.required'=>'Please enter the book title!',
            'book_author.required'=>'Please enter the author name of the book!',
            'book_chapter.required'=>'Please enter the total amount chapter of the book!',
            'book_pages.required'=>'Please enter the total amount pages of the book!'
        ];

        //validation before saving
        $validatedData=$this->validate($request,[
            'book_title'=>'required',
            'book_author'=>'required',
            'book_chapter'=>'required',
            'book_pages'=>'required',
        ],$custom);


        if($validatedData){
            $book = new Book;
            $user=Auth::user();

            $book->user_id = $user->id;
            $book->book_title= $request->book_title;
            $book->book_author= $request->book_author;
            $book->book_chapter= $request->book_chapter;
            $book->book_pages = $request->book_pages;
            $book->book_category= $request->book_category;
            $book->book_pagesCompleted=0;
            $book->book_chaptersCompleted = 0;
            $book->book_isDone= 0;

            $book->save();

            return redirect(route('dashboard'));
        }

    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('editBooks',compact('book'));
    }

    public function update(Request $request,$id)
    {
        //custom validation messages
        $custom=[
            'book_title.required'=>'Please enter the book title!',
            'book_author.required'=>'Please enter the author name of the book!',
            'book_chapter.required'=>'Please enter the total amount chapter of the book!',
            'book_chaptersCompleted.required'=>'Please enter the chapter that you had completed!',
            'book_pagesCompleted.required'=>'Please enter the pages that you had completed!',
        ];

        //validation before saving
        $validatedData=$this->validate($request,[
            'book_title'=>'required',
            'book_author'=>'required',
            'book_chapter'=>'required',
            'book_chaptersCompleted'=>'required|lte:book_chapter',
            'book_pagesCompleted'=>'required|lte:book_pages',
        ],$custom);

        //find book
        $book = Book::find($id);

        //check whether if pages completed is max, chapter is max or not
        if($request->book_pagesCompleted == $book->book_pages)
        {
            if($request->book_chaptersCompleted != $book->book_chapter)
            {
                return back()->withErrors(['You have finished the book, but chapter or pages is not right!']);
            }
        }
        if($validatedData)
        {
            $book->book_title= $request->book_title;
            $book->book_author= $request->book_author;
            $book->book_chapter= $request->book_chapter;
            $book->book_chaptersCompleted = $request->book_chaptersCompleted;
            $book->book_pagesCompleted = $request->book_pagesCompleted;
            $book->book_category= $request->book_category;

            //check if the pages and chapters already at the end of the books, if yes, then update the book as done
            if($request->book_chaptersCompleted == $book->book_chapter && $request->book_pagesCompleted == $book->book_pages)
            {
                $book->book_isDone = 1;

            }else
            {
                $book->book_isDone=0;
            }
            $book->save();
            return redirect(route('dashboard'));
        }

    }

    public function destroy($id)
    {
       $book = Book::find($id);
       $book->delete();

       return redirect(route('dashboard'));

    }
}
