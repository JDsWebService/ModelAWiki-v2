<?php

use App\Models\Category;
use App\Models\Admin\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Body\Post::class, function (Faker $faker) {
	$title = $faker->words(4, true);
	$slug = Str::slug($title, '-');
	$slug = Str::limit($slug, 90);

    return [
    	'user_id' => Admin::all()->random()->id,
    	'category_id' => Category::all()->random()->id,
        'title' => $title,
        'subtitle' => $faker->words(4, true),
        'body' => $faker->paragraphs(3, true),
        'slug' => $slug,
        'image' => 'placeholder.png',
        'published_at' => $faker->dateTimeThisMonth(),
    ];
});