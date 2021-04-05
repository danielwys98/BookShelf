<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    protected $primaryKey = 'book_id';
    protected $fillable=['book_id','user_id','book_title','book_author','book_chapter','book_pages','book_category','book_pagesCompleted','book_chaptersCompleted','book_isDone'];

    public function UserBooks()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
