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
        Form::component('tagForm', 'components.form.blog.tag', ['route', 'method', 'submit_text', 'tag' => null, 'tag_id' => null]);

        // Category Form
        Form::component('categoryForm', 'components.form.blog.category', ['route', 'method', 'submit_text', 'category' => null, 'category_id' => null]);
        
        // Post Form
        Form::component('postForm', 'components.form.blog.post', ['categories', 'tags', 'route', 'method', 'submit_text', 'post' => null, 'post_id' => null]);

        // Part Section Form
        Form::component('partSectionForm', 'components.form.part.section', ['route', 'method', 'submit_text', 'section' => null, 'section_id' => null]);

        // Part Form
        Form::component('partForm', 'components.form.part.part', ['sections', 'route', 'method', 'submit_text', 'part' => null, 'part_id' => null]);

        // Role Form
        Form::component('roleForm', 'components.form.admin.role', ['route', 'method', 'submit_text', 'permissionsByCategory' => null, 'role' => null, 'role_id' => null]);

        // Single Permission Form
        Form::component('singlePermissionForm', 'components.form.admin.permission-single', ['route', 'method', 'submit_text', 'categories' => null, 'permission' => null, 'permission_id' => null]);

        // CRUD Permissions Form
        Form::component('crudPermissionForm', 'components.form.admin.permission-crud', ['submit_text', 'categories' => null]);
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
