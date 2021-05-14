<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;


$factory->define(Participant::class, function (Faker $faker) {
     return [     	
        'name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'NroWp' => $faker->phoneNumber,
		'profession_id'=>rand(1,7),
    ];

//'cedula' => $faker->unique()->randomDigit,






//OTRA FORMA DE INSERTAR REGISTROA ALEATORIOS
        //  foreach (range(1,50) as $index) {

        // Profile::create([
        //     'user_id'           =>  $faker->randomDigit,
        //     'name'              =>  $faker->firstNameMale,
        //     'value_added_tax'   =>  $faker->randomDigit,
        //     'city'              =>  $faker->city,
        //     'zip_code'          =>  $faker->postcode,
        //     'country'           =>  $faker->country,
        //     'phone'             =>  $faker->phoneNumber,
        //     'img_src'           =>  $faker->imageUrl($width = 200, $height = 200)
        // ]);


});
