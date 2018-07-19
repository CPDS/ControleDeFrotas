<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable=[
    	'nome','placa','tipo_combustivel'
    ];
}
