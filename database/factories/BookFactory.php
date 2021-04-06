<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'book_title' => $faker->sentence,
        'book_author' => $faker->name,
        'book_chapter' => $faker->numberBetween(50, 100),
        'book_chaptersCompleted' => $faker->numberBetween(1, 49),
        'book_pages' => $faker->numberBetween(200,800),
        'book_pagesCompleted' => $faker->numberBetween(1,199),
        'book_category' => $faker->
        randomElement([
            'Fantasy',
            'Fictions',
            'Non-Fictions',
            'Sci-Fi',
            'Mystery',
            'Thriller',
            'Romance',
            'Westerns',
            'Others']),
        'book_isDone' => 0, //making every book is not done, therefore can test the functionality
    ];
});
