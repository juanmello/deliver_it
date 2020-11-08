<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProvaCorrida::class, function (Faker $faker) {
    return [
            'nome' => $faker->sentence(3, true),
            'tipo_prova' => $faker->numberBetween(5, 100),
            'data_prova' => $faker->dateTimeBetween('- 5 years', '+ 5 years')
    ];
});
