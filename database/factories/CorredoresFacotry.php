<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Corredor::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName() . ' ' . $faker->lastName(),
        'cpf' => $faker->cpf(false),
        'data_nascimento' => $faker->dateTimeBetween('- 65 years', '- 15 years'),
    ];
});
