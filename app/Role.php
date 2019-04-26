<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Função / Papel
    protected $fillable = [
        'name', 'description'
    ];

    /*
    * Criando um relacionamento do funções com usuários
    * Relacionamento muitos para muitos
    */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    // Method utilizado quando quiser realizar um relacionamento com permissões
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
