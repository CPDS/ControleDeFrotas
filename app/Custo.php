<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    protected $fillable=[
        'qtd_diaria','valor_diaria','custo_total_diaria','valor_manutencao','custo_total_viagem',
    ];
}
