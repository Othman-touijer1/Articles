<?php

namespace App\Providers;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use App\Policies\ArticlePolicy;



// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot()
{
    $this->registerPolicies();

    // Gate for adding articles (only user 1)
    Gate::define('add-article', function ($user) {
        return $user->id === 10;
    });

    // Gate for editing articles (user 1 and 2)
    Gate::define('edit-article', function ($user) {
        return in_array($user->id, [10, 11]);
    });

    // Gate for deleting articles (user 1 and 3)
    Gate::define('delete-article', function ($user) {
        return in_array($user->id, [10, 12]);
    });
}
}
