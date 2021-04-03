@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Dashboard</h3>
        {{--inserted dummy data/table to check the view of the dashboard--}}
        <table class="table table-striped">
            <thead>
            @if(count($books))
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book title</th>
                <th scope="col">Author</th>
                <th scope="col">Chapters</th>
                <th scope="col">Chapters Completed</th>
                <th scope="col">Categories</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$book->book_title}}</td>
                <td>{{$book->book_author}}</td>
                <td>{{$book->book_chapter}}</td>
                <td><progress class="books_progress" value="{{$book->book_hasCompleted}}" max="{{$book->book_chapter}}">{{$book->book_hasCompleted}}</progress></td>
                <td>{{$book->book_category}}</td>
                <td>
                    <a href="/editBooks"><button class="btn btn-success">Edit</button></a>
                    <a href="#"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <th>You do not have any books now!</th>
                </tr>
            @endif
            </tbody>
        </table>
        <a href="/newBooks"><button class="btn btn-primary float-right">Add a book</button></a>
    </div>
@endsection
