<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Forum\ForumCategory::class, function (Faker $faker) {

	$name = $faker->unique()->words(1, true);
	$slug = $name . '-' . $faker->unique()->randomNumber($nbDigits = 9);
	$colors =  ['#C62828', '#AD1457', '#6A1B9A', '#4527A0', '#283593',
				'#1565C0', '#0277BD', '#00838F', '#00695C', '#2E7D32',
				'#558B2F', '#9E9D24', '#F9A825', '#FF8F00', '#EF6C00',
				'#D84315', '#4E342E', '#424242', '#37474F'];
	$chosenColor = array_rand($colors, 2);

    return [
        'name' => $name,
        'slug' => $slug,
        'color' => $colors[$chosenColor[0]],
    ];
});