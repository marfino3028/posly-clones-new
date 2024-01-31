<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Laravel\Passport\Client;
use Laravel\Passport\Token;

class AuthServiceProvider extends ServiceProvider
{
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    // protected $policies = [
    //     'App\Models\Employee'   => 'App\Policies\EmployeePolicy',
    // ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::useClientModel(Client::class);
        Passport::useTokenModel(Token::class);
        $this->registerPolicies();
        
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super-Admin')) {
                return true;
            }
        });        
        Passport::routes();
    }
}
