<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable=[
    	'nome','placa','tipo_combustivel','qtd_total_lugares','ano_fabricacao','minimo_passageiros','maximo_passageiros','rendimento','marca','tem_arcondicionado','tipo_bagageiro'
    ];
}
