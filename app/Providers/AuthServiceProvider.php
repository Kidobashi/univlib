<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('logged-in', function ($user){
            return $user;
        });

        Gate::define('is-admin', function ($user){
            //return $user->hasAnyRoles('Admin', 'SuperAdmin', 'author');
            return $user->hasAnyRole('Admin');
        });

        Gate::define('is-librarian', function ($user){
            //return $user->hasAnyRoles('Admin', 'SuperAdmin', 'author');
            return $user->hasAnyRole('Librarian');
        });
    }
}
