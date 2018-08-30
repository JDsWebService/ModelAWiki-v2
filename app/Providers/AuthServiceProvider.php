<?php

namespace App\Providers;

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Posts Policy
        Gate::define('post.view', 'App\Policies\PostsPolicy@view');
        Gate::define('post.create', 'App\Policies\PostsPolicy@create');
        Gate::define('post.update', 'App\Policies\PostsPolicy@update');
        Gate::define('post.delete', 'App\Policies\PostsPolicy@delete');
        Gate::define('post.publish', 'App\Policies\PostsPolicy@publish');
        Gate::define('post.edit', 'App\Policies\PostsPolicy@edit');
        Gate::define('post.global', 'App\Policies\PostsPolicy@global');

        // Categories Policy
        Gate::define('category.view', 'App\Policies\CategoriesPolicy@view');
        Gate::define('category.create', 'App\Policies\CategoriesPolicy@create');
        Gate::define('category.update', 'App\Policies\CategoriesPolicy@update');
        Gate::define('category.delete', 'App\Policies\CategoriesPolicy@delete');
        Gate::define('category.edit', 'App\Policies\CategoriesPolicy@edit');
        Gate::define('category.global', 'App\Policies\CategoriesPolicy@global');

        // Tags Policy
        Gate::define('tag.view', 'App\Policies\TagsPolicy@view');
        Gate::define('tag.create', 'App\Policies\TagsPolicy@create');
        Gate::define('tag.update', 'App\Policies\TagsPolicy@update');
        Gate::define('tag.delete', 'App\Policies\TagsPolicy@delete');
        Gate::define('tag.edit', 'App\Policies\TagsPolicy@edit');
        Gate::define('tag.global', 'App\Policies\TagsPolicy@global');

        // Parts Section Policy
        Gate::define('part.section.view', 'App\Policies\PartSectionsPolicy@view');
        Gate::define('part.section.create', 'App\Policies\PartSectionsPolicy@create');
        Gate::define('part.section.update', 'App\Policies\PartSectionsPolicy@update');
        Gate::define('part.section.delete', 'App\Policies\PartSectionsPolicy@delete');
        Gate::define('part.section.edit', 'App\Policies\PartSectionsPolicy@edit');
        Gate::define('part.section.global', 'App\Policies\PartSectionsPolicy@global');

        // Parts Policy
        Gate::define('part.view', 'App\Policies\PartsPolicy@view');
        Gate::define('part.create', 'App\Policies\PartsPolicy@create');
        Gate::define('part.update', 'App\Policies\PartsPolicy@update');
        Gate::define('part.delete', 'App\Policies\PartsPolicy@delete');
        Gate::define('part.edit', 'App\Policies\PartsPolicy@edit');
        Gate::define('part.global', 'App\Policies\PartsPolicy@global');

        // Admin Management Policy
        Gate::define('admin.global', 'App\Policies\AdminManagementPolicy@global');

        // User Management Policy
        Gate::define('user.global', 'App\Policies\UserManagementPolicy@global');

    }
}
