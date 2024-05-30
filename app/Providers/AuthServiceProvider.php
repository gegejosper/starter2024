<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

        Gate::define('manage-admin', function($user){
            return $user->hasRole(['admin']);
        });
        // Gate::define('manage-warehouse', function($user){
        //     return $user->hasAnyRoles(['admin', 'warehouse']);
        // });
    }
}
