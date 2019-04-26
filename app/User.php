<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    * Criando um relacionamento do usuário com funções
    * Relacionamento muitos para muitos
    */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // Verificar se tem papel
    public function hasRoles($roles)// Recebe uma lista de papeis
    {
        $userRoles = $this->roles;
        return $roles->intersect($userRoles)->count();
    }

    // Verificar se é administrador porque o administrador vai ter acesso total
    public function isAdmin()
    {
        return $this->hasRole('Administrador'); // se for administrador vai ter acesso a tudo
    }

    // Verificar papel
    public function hasRole($role)
    {
        if(is_string($role)){
            $role = Role::where('name','=',$role)->firstOrFail();
        }

        return (boolean) $this->roles()->find($role->id);
    }
}
