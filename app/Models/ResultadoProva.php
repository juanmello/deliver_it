<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoProva extends Model
{
    protected $primaryKey = 'corredor_prova_id';
    protected $table = 'resultados_provas';
    protected $guarded = [];
    protected $dates = ['hora_conclusao_prova'];

    public function corredorProva()
    {
        return $this->belongsTo('App\Models\CorredorProva', 'corredor_prova_id');
    }
}
