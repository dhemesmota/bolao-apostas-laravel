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
     * Relacionamento com partidas
     */
    public function matches()
    {
        return $this->hasMany('App\Match');
    }

    /**
     * Definindo o method acessor
     * acessando o method acima para buscar o titulo do betting
     */
    public function getBettingTitleAttribute()
    {
        return ucfirst($this->betting->title); // ucfirst - transforma o primeiro caractere em maiuscula
    }

    /**
     * Mudar formato da data que será cadastrada no banco
     */
    public function setDateStartAttribute($value)
    {
        $date = date_create($value);

        $this->attributes['date_start'] = date_format($date, 'Y-m-d H:i:s');
    }
    public function setDateEndAttribute($value)
    {
        $date = date_create($value);

        $this->attributes['date_end'] = date_format($date, 'Y-m-d H:i:s');
    }

    /**
     * Mudando o formato da data para exibir ao usuário
     * Obs: Mudar na controler a lista que é enviada para view, utilizar date_start_site
     */
    public function getDateStartSiteAttribute()
    {
        $date = date_create($this->date_start);
        return date_format($date, 'd/m/Y \a\s H:i');
    }
    public function getDateEndSiteAttribute()
    {
        $date = date_create($this->date_end);
        return date_format($date, 'd/m/Y \a\s H:i');
    }
}
