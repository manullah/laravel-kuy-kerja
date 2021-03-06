<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('manage.users', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('manage.job-positions', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('manage.type-of-works', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('manage.work-experiences', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('manage.job-vacancies', function (User $user) {
            return $user->role_id == 1;
        });
    }
}
