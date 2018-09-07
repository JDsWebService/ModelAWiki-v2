<?php

namespace App\Providers;

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Posts Policy
        Gate::define('post.view', 'App\Policies\Blog\PostsPolicy@view');
        Gate::define('post.create', 'App\Policies\Blog\PostsPolicy@create');
        Gate::define('post.update', 'App\Policies\Blog\PostsPolicy@update');
        Gate::define('post.delete', 'App\Policies\Blog\PostsPolicy@delete');
        Gate::define('post.publish', 'App\Policies\Blog\PostsPolicy@publish');
        Gate::define('post.edit', 'App\Policies\Blog\PostsPolicy@edit');
        Gate::define('post.global', 'App\Policies\Blog\PostsPolicy@global');

        // Categories Policy
        Gate::define('category.view', 'App\Policies\Blog\CategoriesPolicy@view');
        Gate::define('category.create', 'App\Policies\Blog\CategoriesPolicy@create');
        Gate::define('category.update', 'App\Policies\Blog\CategoriesPolicy@update');
        Gate::define('category.delete', 'App\Policies\Blog\CategoriesPolicy@delete');
        Gate::define('category.edit', 'App\Policies\Blog\CategoriesPolicy@edit');
        Gate::define('category.global', 'App\Policies\Blog\CategoriesPolicy@global');

        // Tags Policy
        Gate::define('tag.view', 'App\Policies\Blog\TagsPolicy@view');
        Gate::define('tag.create', 'App\Policies\Blog\TagsPolicy@create');
        Gate::define('tag.update', 'App\Policies\Blog\TagsPolicy@update');
        Gate::define('tag.delete', 'App\Policies\Blog\TagsPolicy@delete');
        Gate::define('tag.edit', 'App\Policies\Blog\TagsPolicy@edit');
        Gate::define('tag.global', 'App\Policies\Blog\TagsPolicy@global');

        // Parts Section Policy
        Gate::define('part.section.view', 'App\Policies\Parts\PartSectionsPolicy@view');
        Gate::define('part.section.create', 'App\Policies\Parts\PartSectionsPolicy@create');
        Gate::define('part.section.update', 'App\Policies\Parts\PartSectionsPolicy@update');
        Gate::define('part.section.delete', 'App\Policies\Parts\PartSectionsPolicy@delete');
        Gate::define('part.section.edit', 'App\Policies\Parts\PartSectionsPolicy@edit');
        Gate::define('part.section.global', 'App\Policies\Parts\PartSectionsPolicy@global');

        // Parts Policy
        Gate::define('part.view', 'App\Policies\Parts\PartsPolicy@view');
        Gate::define('part.create', 'App\Policies\Parts\PartsPolicy@create');
        Gate::define('part.update', 'App\Policies\Parts\PartsPolicy@update');
        Gate::define('part.delete', 'App\Policies\Parts\PartsPolicy@delete');
        Gate::define('part.edit', 'App\Policies\Parts\PartsPolicy@edit');
        Gate::define('part.global', 'App\Policies\Parts\PartsPolicy@global');

        // Admin Management Policy
        Gate::define('admin.global', 'App\Policies\AdminManagementPolicy@global');

        // User Management Policy
        Gate::define('user.global', 'App\Policies\UserManagementPolicy@global');

    }
}
