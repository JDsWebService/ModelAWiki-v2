<?php

use App\Models\Forum\ForumPost;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Forum\ForumReply::class, function (Faker $faker) {
    return [
    	'post_id' => ForumPost::all()->random()->id,
    	'user_id' => User::all()->random()->id,
        'slug' => $faker->unique()->randomNumber($nbDigits = 9),
        'body' => $faker->paragraphs(3, true),
    ];
});

$factory->afterMaking(App\Models\Forum\ForumReply::class, function ($user, $faker) {
    echo 'Entry Created';
});