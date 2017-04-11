<?php

namespace App\Providers;

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

        Gate::define('isRoot', function ($user) {

            return $user->type == 'root';
        });

        Gate::define('isAdmin', function ($user) {

            return $user->type == 'root' || $user->type == 'admin';
        });
        
        Gate::define('isClient', function ($user) {

            return $user->type == 'client';
        });

        Gate::define('isVerified', function ($user) {

            return $user->registration_token == '';
        });
    }
}
