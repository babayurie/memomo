<?php

use Faker\Generator as Faker;
$faker = Faker::create('ja_JP');

$factory->define(\App\Memo::class, function () use ($faker) {
    return [
        'user_id' => 1,
        'title' => $faker->text(25),
        'contents' => $faker->realText(200, 5),
        'favorite' => true,
        'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
    ];
});
