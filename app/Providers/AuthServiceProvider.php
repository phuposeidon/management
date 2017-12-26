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

        Gate::define('receptionist', function($user) {
            return $user->userType === 'Lễ Tân' || $user->userType === 'Admin';
        });

        Gate::define('doctor', function($user) {
            return $user->userType === 'Bác Sĩ' || $user->userType === 'Admin';
        });

        Gate::define('cashier', function($user) {
            return $user->userType === 'Thu Ngân' || $user->userType === 'Admin';
        });

        Gate::define('admin', function($user) {
            return $user->userType === 'Admin';
        });

        Gate::define('edit-user', function($user, $userId) {
            return $user->userType === 'Admin' || $user->id == $userId;
        });

    }
}
