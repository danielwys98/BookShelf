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
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('admin123')
        ]);

        factory(Book::class,100)->create();
    }
}
