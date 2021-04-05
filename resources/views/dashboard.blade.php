@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{--Heading--}}
        <h3>Dashboard</h3>
        {{--search bar--}}
        <div class="pb-2">
            <form action="{{ route('searchBooks') }}" method="POST" class="form-inline float-right">
                {{ method_field('GET') }}
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <select class="form-control" id="book_search_by" name="book_search_by">
                            <option value="book_title">Book title</option>
                            <option value="book_author">Author</option>
                            <option value="book_category">Categories</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="book_data" placeholder="Book details here...">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-info" value="Search"/>
                    </div>
                </div>
            </form>
        </div>
        {{--some statistic--}}
        <div class="card-deck">
            <div class="card border-info col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Total Books:</h5>
                    <small class="card-text">You have {{$countBooks}} in total.</small>
                </div>
            </div>
            <div class="card border-success col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Completed Books:</h5>
                    <small class="card-text">You have completed {{$completedBooks}} books in total.</small>
                </div>
            </div>
        </div>
        <br/>
        {{--table contains the data--}}
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
                        <a href="{{route('deleteBooks',$book->book_id)}}" onclick="return confirm('Are you sure you want to delete this book?')"><button class="btn btn-danger">Delete</button></a>

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
                <span class="float-right">{{$books->links()}}</span>
        </div>
        <hr/>
        <a href="{{route('newBooks')}}"><button class="btn btn-primary float-right mr-2">Add a book</button></a>
    </div>
@endsection
