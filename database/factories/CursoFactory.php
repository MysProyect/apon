<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8),
        'description' => $faker->sentence(50),
        'user_created' => 1,
        'statud' => rand(0,1),
        'img' => $faker->imageUrl($width = 400, $height = 200),
        //'duration' => "2 hras",
        //'img' => $faker->image('public/storage/cursos',440,480, null, false),
		'statud'=>1,
    ];
});
