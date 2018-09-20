<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable=[
    	'empresa_contratada_nome','empresa_contratada_cnpj','numero_contrato','data_inicio_contrato','data_vencimento_contrato','valor_contratado','tipo'
    ];
}
