<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('manage-admin', function($user){
            return $user->hasRole(['admin']);
        });
    }
}
