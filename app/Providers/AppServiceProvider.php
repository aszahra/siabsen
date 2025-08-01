<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('role=Admin', function ($user) {
            return $user->role === 'Admin';
        });
        Gate::define('role=Guru', function ($user) {
            return $user->role === 'Guru';
        });
    }
}
