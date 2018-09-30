<?php

use App\Models\Forum\ForumCategory;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Forum\ForumPost::class, function (Faker $faker) {
	$title = $faker->words(4, true);
	$slug = str_slug($title) . '-' . $faker->unique()->randomNumber($nbDigits = 9);

    return [
    	'user_id' => User::all()->random()->id,
    	'category_id' => ForumCategory::all()->random()->id,
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->paragraphs(3, true),
    ];
});