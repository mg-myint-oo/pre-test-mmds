<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker -> sentence,
        'body' => $faker -> paragraph(5),
        'is_published' => false,
        'user_id' => rand(1, 11)
    ];
});
