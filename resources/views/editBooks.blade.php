@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Edit books</h3>
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
        <form action="{{ route('updateBooks',$book->book_id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="book_title">Books Title:</label>
                <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Enter books title" value="{{old('book_title',$book->book_title)}}">
            </div>
            <div class="form-group">
                <label for="book_author">Author:</label>
                <input type="text" class="form-control" id="book_author" name="book_author" placeholder="Enter author's name" value="{{old('book_author',$book->book_author)}}">
            </div>
            <div class="form-group">
                <label for="book_chapter">Total Chapters:</label>
                <input type="number" class="form-control" id="book_chapter" name="book_chapter" placeholder="Enter amount of chapters" value="{{old('book_chapter',$book->book_chapter)}}">
            </div>
            <div class="form-group">
                <label for="book_chapter">Chapter progress:</label>
                <input type="number" class="form-control" id="book_chaptersCompleted" name="book_chaptersCompleted" placeholder="Enter amount of chapters completed" value="{{old('book_chaptersCompleted',$book->book_chaptersCompleted)}}">
            </div>
            <div class="form-group">
                <label for="book_pages">Total Pages:</label>
                <input type="number" class="form-control" id="book_pages" name="book_pages" placeholder="Enter amount of Total Pages" value="{{old('book_pages',$book->book_pages)}}">
            </div>
            <div class="form-group">
                <label for="book_pagesCompleted">Pages progress:</label>
                <input type="number" class="form-control" id="book_pagesCompleted" name="book_pagesCompleted" placeholder="Enter amount of pages completed" value="{{old('book_pagesCompleted',$book->book_pagesCompleted)}}">
            </div>
            <div class="form-group">
                <label for="book_category">Categories:</label>
                <select class="form-control" id="book_category" name="book_category">
                    <option>{{old('book_category',$book->book_category)}} <hr/></option>
                    <option>-------------</option>
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
        {{--    <div class="form-check">
                <input type="checkbox" class="form-check-input" id="book_isDone" name="book_isDone" value=1
                       {{$book->book_isDone == 1 ? 'checked' : ''}}>
                <label for="book_isDone" class="form-check-label">Finished</label>
            </div>--}}
            <input type="submit" class="btn btn-primary float-right" value="Save"/>
            <input type="reset" class="btn btn-danger float-left"/>
        </form>
        <a href="{{route('dashboard')}}"><button class="btn btn-secondary float-right mr-2">Back</button></a>
    </div>
@endsection
