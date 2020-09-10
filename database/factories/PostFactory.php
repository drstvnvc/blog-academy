<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence(5),
      'body' => $faker->realText(),
      'is_published' => rand(0, 100) < 70
    ];
});
