<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'round_id',
        'title',
        'stadium',
        'team_a',
        'team_b',
        'result',
        'scoreboard_a',
        'scoreboard_b',
        'date',
    ];

    /**
     * Relacionando com a rodada
     */
    public function round()
    {
        return $this->belongsTo('App\Round');
    }

    /**
     * Mudar formato da data que será cadastrada no banco
     */
    public function setDateAttribute($value)
    {
        $date = date_create($value);

        $this->attributes['date'] = date_format($date, 'Y-m-d H:i:s');
    }

    /**
     * Mudando o formato da data para exibir ao usuário
     * Obs: Mudar na controler a lista que é enviada para view, utilizar date_site
     */
    public function getDateSiteAttribute()
    {
        $date = date_create($this->date);
        return date_format($date, 'd/m/Y \a\s H:i');
    }
}
