<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // Permissões
    protected $fillable = [
        'name', 'description'
    ];

    // Relacionamento de muitos para muitos
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
