<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Responsabl;
use Faker\Generator as Faker;


//$faker = Faker\Factory::create('es_ES');
$factory->define(Responsabl::class, function (Faker $faker) {
    

    return [
        'name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'NroWp' => $faker->phoneNumber,
		'profession_id'=>rand(1,7),
    ];






});


    //return [
//         'profession_id' => Profession::inRandomOrder()->value('id') ?: factory(Profession::class),
//         'gender' => $faker->randomElement(['male', 'female']),


//         'first_name' => function (array $user) {
//             return $faker->firstName($user['gender']);
//         },
//         'last_name' => $faker->lastName,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'company_name' => $faker->optional(0.6)->company,
//         'email_verified_at' => now(),
//         'remember_token' => str_random(10),
//         'phone_number' => $faker->phoneNumber,
//         'role' => $faker->randomElement(['admin', 'author', 'suscriptor']),
//     ];


//     // Analisis del factori
//     Con randomElement devolvemos una de las opciones pasadas en el arreglo, como por ejemplo, en genre solo tendrá dos posibles valores male o female.
// Con safeEmail obtenemos un email aleatorio pero usando dominios no existentes como example.com, etc.
// Con optional(60)->company le indicamos que solo el 60% de las veces se asigne un nombre de compañía, en caso contrario, devuelva null