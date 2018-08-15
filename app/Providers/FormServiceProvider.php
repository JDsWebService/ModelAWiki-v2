<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Tag Form
        Form::component('tagForm', 'components.form.tag', ['route', 'method', 'submit_text']);
        // Category Form
        Form::component('categoryForm', 'components.form.category', ['route', 'method', 'submit_text']);
        // Post Form
        Form::component('postForm', 'components.form.post', ['route', 'method', 'submit_text', 'post' => null, 'post_id' => null]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        // 
    }
}
