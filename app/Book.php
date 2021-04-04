<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    protected $primaryKey = 'book_id';
    public function UserBooks()
    {
        return $this ->belongsTo('App\User','user_id');
    }
}
