<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\ThreadPolicy;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('update-thread', [ThreadPolicy::class, 'update']);
    }
}
