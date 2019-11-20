<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Filme;
use Faker\Generator as Faker;

$factory->define(Filme::class, function (Faker $faker) {
    return [
        'titulo' => $faker->firstName,
        'sinopse' => $faker->lastName,
        'id_protagonista' => mt_rand(1,20),
        'id_genero' => mt_rand(1,6)
    ];
});
