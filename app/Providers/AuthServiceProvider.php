<?php

namespace App\Providers;

// -*- Add as GateContract
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        
        $gate->define('isAdmin', function($admin){
            return $admin->admin_type == 'admin';
        });
    
        $gate->define('isAuthor', function($user){
            return $user->user_type == 'author';
        });

        $gate->define('isCompany', function($company){
            return $company->user_type == 'company';
        });

        $gate->define('isUser', function($user){
            return $user->user_type == 'user';
        });
    }
}
