<?php

use Faker\Generator as Faker;

use App\Models\Parts\Section;
use Illuminate\Support\Str;

$factory->define(App\Models\Parts\Part::class, function (Faker $faker) {
    $name = $faker->words(4, true);
	$slug = Str::slug($name, '-');
	$slug = Str::limit($slug, 90);

	// $original = $faker->image('public/images/parts/originals',1200,1200, null, false, false);
	// $header = $faker->image('public/images/parts/headers',1080,250, null, false, false);
	// $thumbnail = $faker->image('public/images/parts/thumbnails',150,150, null, false, false);

    return [
    	'section_id' => Section::all()->random()->id,
        'name' => $name,
        'slug' => $slug,
        'part_number' => $faker->unique()->randomNumber(6, true),
        'description' => $faker->paragraphs(3, true),
        'date_start' => $faker->numberBetween(1927, 1932) . '-' . $faker->numberBetween(1, 12) . '-1',
        'date_end' => $faker->numberBetween(1927, 1932) . '-' . $faker->numberBetween(1, 12) . '-1',
        'body_type' => $faker->words(4, true),
        'year' => $faker->numberBetween(1927, 1932),
        'reminder' => $faker->paragraphs(3, true),
        'tip' => $faker->paragraphs(3, true),
        'warning' => $faker->paragraphs(3, true),
        'fun_fact' => $faker->paragraphs(3, true),
        // 'featured_image' => $original,
        'featured_image' => 'placeholder.png',
    ];
});
