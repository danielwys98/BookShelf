<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Alert;
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
        //get all the books for current users
        $user=Auth::user()->id;
        //after getting all books then paginate 10 data in the table
        $books = Book::where('user_id',$user)->paginate(10);
        $temp = Book::where('user_id',$user)->get();
        //counting total book for current users

        $countBooks = $temp->count();

        //count totals books are completed all categories
        $temp1 = Book::where('user_id',$user)
                    ->where('book_isDone',1)
                    ->get();
        $completedBooks = $temp1->count();

        return view('dashboard',compact(['books','countBooks','completedBooks']));
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

        //if data is validated then save all the data
        if($validatedData){
            $user=Auth::user();
            //using first or new to check whether the book had been created before
            //it checks every arguments
            $book = Book::firstOrNew(
                ['user_id' => $user->id,
                'book_title'=>$request->book_title,
                'book_author'=>$request->book_author,
                'book_chapter'=>$request->book_chapter,
                'book_pages'=>$request->book_pages,
                'book_category'=>$request->book_category,
                'book_pagesCompleted'=>0,
                'book_chaptersCompleted'=>0,
                'book_isDone'=>0,
                ]);
        }
        //if book is not exists in DB, it will save and return success msg
        //else error msg will be prompted
        if(!$book->exists)
        {
            $book->save();
            return redirect(route('dashboard'))->with('success', 'New book is saved!');
        }else
        {
            alert()->error('You already have the book!');
            return back()->withInput();
        }


    }

    public function edit($id)
    {
        //look for the book's details
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

        //check whether if pages completed is max and chapter is max or not
        //pages is max, chapter is not, not logic therefore an error will thrown to edit the data
        if($request->book_pagesCompleted == $book->book_pages && $request->book_chaptersCompleted != $book->book_chapter )
        {
                alert()->error('There is something wrong!');
                return back()->withErrors(['You reached the end of the pages, but chapter is still in progress']);
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
            return redirect(route('dashboard'))->with('success', 'You updated the book!');
        }

    }

    public function destroy($id)
    {
       $book = Book::find($id);
       $book->delete();

       return redirect(route('dashboard'))->with('success', 'The book is in your memory now!');

    }

    public function search(Request $request)
    {
        //getting current user's id
        $user = Auth::user()->id;

        //search the books by either title,authors or categories that choose by the user in the views
        $books= Book::where($request->book_search_by,'LIKE','%'.$request->book_data.'%')->where('user_id',$user)->paginate(100);
        //counts the total books of the current search
        $countBooks = $books->count();


        //getting each book ids that the users had
        $ids= [];
        foreach($books as $temp)
        {
            $ids [] = $temp->book_id;
        }
        //check each books whether is done reading by the users.
        //depending on the search type.
        $temp2 = Book::whereIn('book_id',$ids)
            ->where('book_isDone',1)
            ->get();

        //count all the books that are done reading by the users
        $completedBooks = $temp2->count();

        return view('dashboard',compact(['books','countBooks','completedBooks']));

    }
}
