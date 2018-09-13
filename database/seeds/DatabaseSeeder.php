<?php

use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Users Seeder
        // factory(App\Models\User\User::class, 50)->create();

        // Blog Posts, Tags, and Categories Seeder
    	// factory(App\Models\Blog\Category::class, 5)->create();
    	// factory(App\Models\Blog\Tag::class, 75)->create();
     //    factory(App\Models\Blog\Post::class,50)->create()->each(function ($post) {
     //        for($i = 1; $i <= 6; $i++) {
     //        	$tag_id = Tag::all()->random()->id;
     //        	$post->tags()->attach($tag_id);
     //        } 
     //    });

        // Parts Section and Parts Seeders
        // factory(App\Models\Parts\Section::class, 20)->create();
        // factory(App\Models\Parts\Part::class, 500)->create();

    	
    }
}
