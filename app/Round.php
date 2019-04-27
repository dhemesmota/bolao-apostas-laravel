<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'betting_id',
        'title',
        'date_start', 
        'date_end'
    ];

    /**
     * Relacionamento para futuramente exibir quem é o dono do bolão
     */
    public function betting()
    {
        return $this->belongsTo('App\Betting');
    }

    /**
     * Definindo o method acessor
     * acessando o method acima para buscar o titulo do betting
     */
    public function getBettingTitleAttribute()
    {
        return ucfirst($this->betting->title); // ucfirst - transforma o primeiro caractere em maiuscula
    }
}
