<?php

use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use App\Models\Forum\ForumCategory;
use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumReply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        // factory(App\Models\Blog\Post::class,50)->create()->each(function ($post) {
        //     for($i = 1; $i <= 6; $i++) {
        //     	$tag_id = Tag::all()->random()->id;
        //     	$post->tags()->attach($tag_id);
        //     } 
        // });

        // Parts Section and Parts Seeders
        // factory(App\Models\Parts\Section::class, 20)->create();
        // factory(App\Models\Parts\Part::class, 500)->create();

        // Forum Seeders
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // ForumReply::truncate();
        // ForumPost::truncate();
        // ForumCategory::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $this->command->comment('Seeding Forum...');
        // $this->command->comment('Creating Forum Categories...');
        // for($i = 1; $i <= 5; $i++) {
        //     $this->command->line(" Forum Category: " . $i);
        //     factory(App\Models\Forum\ForumCategory::class, 1)->create();
        // }
        // $this->command->comment('Creating Forum Posts...');
        // for($i = 1; $i <= 500; $i++) {
        //     $this->command->line(" Forum Post: " . $i);
        //     factory(App\Models\Forum\ForumPost::class, 1)->create();
        // }
        // $this->command->comment('Creating Forum Replies...');
        // for($i = 1; $i <= 20000; $i++) {
        //     $this->command->line(" Forum Reply: " . $i);
        //     factory(App\Models\Forum\ForumReply::class, 1)->create();
        // }
        

    	
    }
}
