<?php

namespace App\Providers;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
       
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    // Define gate for creating articles
    // Gate::define('create', function (User $user) {
    //     return $user->hasPermissionTo('create articles');
    // });
    // // Define gate for editing articles
    // Gate::define('edit', function (User $user, Article $article) {
    //     return $user->hasPermissionTo('edit articles') && $user->id == $article->user_id;
    // });
    //  // Define gate for deleting articles
    //  Gate::define('delete', function (User $user, Article $article) {
    //     return $user->hasPermissionTo('delete articles') && $user->id == $article->user_id;
    // });
    }
}
