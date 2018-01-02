<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Document::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Models\Category::class)->create()->id;
        },
        'file_name' => $faker->text(50),
        'description' => $faker->text(200),
        'size' => $faker->numberBetWeen(0,100),
        'file_type' => 'pdf',
        'thumbnail' => $faker->text(10),
    ];
});
