@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Add a new books!</h3>
        <hr/>
        <form>

            <div class="form-group">
                <label for="title">Books Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter books title">
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author's name">
            </div>
            <div class="form-group">
                <label for="chapter">Chapters:</label>
                <input type="number" class="form-control" id="chapter" placeholder="Enter amount of chapters">
            </div>
            <div class="form-group">
                <label for="categories">Categories:</label>
                <select class="form-control" id="categories">
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
            <button type="submit" class="btn btn-primary float-right">Create</button>
            <input type="reset" class="btn btn-danger float-right mr-2">
        </form>
    </div>
@endsection
