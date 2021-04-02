@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Dashboard</h3>
        {{--inserted dummy data/table to check the view of the dashboard--}}
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book title</th>
                <th scope="col">Authors</th>
                <th scope="col">Chapters</th>
                <th scope="col">Categories</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Somewhere over the rainbow</td>
                <td>Somewhere a guy</td>
                <td>10</td>
                <td>Fictions</td>
                <td>
                    <a href="/editBooks"><button class="btn btn-success">Edit</button></a>
                    <a href="#"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Somewhere over the sun</td>
                <td>Mei Mire</td>
                <td>9</td>
                <td>Non-Fictions</td>
                <td>Edit/Delete</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Somewhere over the moon</td>
                <td>Daniel Wong</td>
                <td>20</td>
                <td>Horror</td>
                <td>Edit/Delete</td>
            </tr>
            </tbody>
        </table>
        <a href="/newBooks"><button class="btn btn-primary float-right">Add a book</button></a>
    </div>
@endsection
