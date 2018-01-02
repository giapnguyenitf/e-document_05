<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Coin::class, function (Faker $faker) {
    return [
        'cost_per_coin' => 1000,
    ];
});
