<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;
use Illuminate\Support\Facades\App;

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
        
        // Garda de rota, controle de acesso
        if(!App::runningInConsole()){
            foreach ($this->listPermissions() as $key => $permission) {
                Gate::define($permission->name, function ($user) use($permission) {
                    return $user->hasRoles($permission->roles) || $user->isAdmin();
                });
            }
        }
    }

    private function listPermissions()
    {
        return Permission::with('roles')->get();
    }
}
