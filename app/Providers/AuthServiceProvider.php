<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
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
        Gate::define('access-admin-panel', function ($user) {
    if (!$user->is_admin) {
        Log::warning("Unauthorized access attempt by user ID {$user->id}");
    }
    return $user->is_admin;
});
    }
}
