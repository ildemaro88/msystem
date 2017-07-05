<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\ModMedico::class, function (Faker\Generator $faker) {
    //static $password;
    return [
        'titulo' => $faker->title($gender = null|'male'|'female'),
        'especialidad' => $faker->randomElement($array = array ('Odontologo','Pediatra','Traumatologo','Cardiologo','Ginecologo','Oftalmologo','Optometrista')) ,
        'nombre' => $faker->firstName($gender = null|'male'|'female'),
        'apellido' => $faker->lastName(),
        'telefono' => $faker->tollFreePhoneNumber(),
    ];
});
