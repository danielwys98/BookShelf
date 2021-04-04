@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Dashboard</h3>
        {{--inserted dummy data/table to check the view of the dashboard--}}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                @if(count($books))
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Chapters Completed</th>
                    <th scope="col">Pages Completed</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$book->book_title}}</td>
                    <td>{{$book->book_author}}</td>
                    <td><small class="mr-1">{{$book->book_chaptersCompleted}}/{{$book->book_chapter}}</small>
                        <progress class="books_progress" value="{{$book->book_chaptersCompleted}}" max="{{$book->book_chapter}}">{{$book->book_chaptersCompleted}}</progress>
                    </td>
                    <td><small class="mr-1">{{$book->book_pagesCompleted}}/{{$book->book_pages}}</small>
                        <progress class="books_progress" value="{{$book->book_pagesCompleted}}" max="{{$book->book_pages}}">{{$book->book_pagesCompleted}}</progress>
                    </td>
                    <td>{{$book->book_category}}</td>
                    <td>
                        @if($book->book_isDone == 1)
                            <p class="text-success">Completed</p>
                        @else
                            <p class="text-danger">Not completed</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('editBooks',$book->book_id)}}"><button class="btn btn-secondary">Edit</button></a>
                        <a href="{{route('deleteBooks',$book->book_id)}}"onclick="return confirm('Are you sure you want to delete this book?')"><button class="btn btn-danger">Delete</button></a>

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
        </div>
        <hr/>
        <a href="{{route('newBooks')}}"><button class="btn btn-primary float-right mr-2">Add a book</button></a>
    </div>
@endsection
