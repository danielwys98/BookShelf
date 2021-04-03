@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Add a new books!</h3>
        <hr/>
        <form action="{{ route('saveBooks') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="book_title">Books Title:</label>
                <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Enter books title">
            </div>
            <div class="form-group">
                <label for="book_author">Author:</label>
                <input type="text" class="form-control" id="book_author" name="book_author" placeholder="Enter author's name">
            </div>
            <div class="form-group">
                <label for="book_chapter">Chapters:</label>
                <input type="number" class="form-control" id="book_chapter" name="book_chapter" placeholder="Enter amount of chapters">
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
            <input type="submit" class="btn btn-primary float-right" value="submit"/>
            <input type="reset" class="btn btn-danger float-right mr-2"/>
        </form>
    </div>
@endsection
