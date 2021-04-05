<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//return views for index,create,edit books views

Route::get('/dashboard','BookController@index')->name('dashboard');

Route::get('/newBooks','BookController@create')->name('newBooks');

Route::get('/editBooks/{id}','BookController@edit')->name('editBooks');

//Saving,update and delete books
Route::post('/newBooks/created','BookController@store')->name('saveBooks');

Route::put('/editBooks/{id}/updated','BookController@update')->name('updateBooks');

//route::delete needed to spoof the method by using form on the delete button @ blade/view
Route::get('/deleteBooks/{id}','BookController@destroy')->name('deleteBooks');

//route for searching book
Route::get('/search','BookController@search')->name('searchBooks');

