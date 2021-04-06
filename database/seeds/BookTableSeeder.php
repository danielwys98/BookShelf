<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Book::class,100)->create();
    }
}
