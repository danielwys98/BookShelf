@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Add a new books!</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <p>There are some missing field that you needed to fill in!</p>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr/>
        <form action="{{ route('saveBooks') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="book_title">Books Title:</label>
                <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Enter books title" value="{{old('book_title')}}">
            </div>
            <div class="form-group">
                <label for="book_author">Author:</label>
                <input type="text" class="form-control" id="book_author" name="book_author" placeholder="Enter author's name" value="{{old('book_author')}}">
            </div>
            <div class="form-group">
                <label for="book_chapter">Total Chapters:</label>
                <input type="number" class="form-control" id="book_chapter" name="book_chapter" placeholder="Enter amount of chapters" value="{{old('book_chapter')}}">
            </div>
            <div class="form-group">
                <label for="book_chapter">Total Pages:</label>
                <input type="number" class="form-control" id="book_pages" name="book_pages" placeholder="Enter amount of pages" value="{{old('book_pages')}}">
            </div>
            <div class="form-group">
                <label for="book_category">Categories:</label>
                <select class="form-control" id="book_category" name="book_category">
                    <option>Fantasy</option>
                    <option>Fictions</option>
                    <option>Non-Fictions</option>
                    <option>Sci-Fi</option>
                    <option>Mystery</option>
                    <option>Thriller</option>
                    <option>Romance</option>
                    <option>Westerns</option>
                    <option>Others</option>
                </select>
            </div>
            <br/>
            <input type="submit" class="btn btn-primary float-right" value="Submit"/>
            <input type="reset" class="btn btn-danger float-left" value="Reset"/>
        </form>
        <a href="{{route('dashboard')}}"><button class="btn btn-secondary float-right mr-2">Back</button></a>
    </div>
@endsection
