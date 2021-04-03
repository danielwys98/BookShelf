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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard','BookController@index')->name('dashboard');

Route::get('/newBooks','BookController@create')->name('newBooks');

Route::get('/editBooks','BookController@edit')->name('editBooks');

//Saving books
Route::post('/newBooks/created','BookController@store')->name('saveBooks');
