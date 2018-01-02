<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Favorite::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'document_id' => function () {
            return factory(App\Models\Document::class)->create()->id;
        },
    ];
});
