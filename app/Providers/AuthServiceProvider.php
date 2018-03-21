<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        if (Schema::hasTable('settings')) {

            $this->registerPolicies();
            foreach ($this->getPermissions() as $permission) {
                Gate::define($permission->slug , function ($user) use($permission){
                    return $user->hasRole($permission->roles);
                });
            }

        }

    }


    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }

}
