<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Transaction::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'coin_id' => function () {
            return factory(App\Models\Coin::class)->create()->id;
        },
        'amount' => $faker->numberBetween(10,1000),
        'status' => true,
    ];
});
