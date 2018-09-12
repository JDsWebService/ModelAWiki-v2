<?php

use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(App\Models\Parts\Section::class, function (Faker $faker) {
    $name = $faker->words(3, true);
	$slug = Str::slug($name, '-');

    return [
        'name' => $name,
        'image' => 'placeholder.png',
        'slug' => $slug,
    ];
});
