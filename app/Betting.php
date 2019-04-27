<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betting extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'current_round', // vai incrementar a cada rodada
        'value_result',
        'extra_value',
        'value_fee',
    ];

    /**
     * Relacionamento para futuramente exibir quem é o dono do bolão
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Sempre colocar no padrão primeira letra maiuscula
     * Usar o method acessor sempre que quiser usar um valor
     * que não esteja nos atributos acima
     * 
     * acessores sempre tem o get...Attribute
     * fazendo relacionamento com o usuario e retornando o nome
     */
    public function getUserNameAttribute($value)
    {
        return $this->user->name;
    }

    /**
     * Relacionamento um para muitos
     */
    public function rounds()
    {
        return $this->hasMany('App\Round');
    }
}
