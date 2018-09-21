<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViagemVeiculo extends Model
{
    protected $fillable=[
        'fk_veiculo','fk_solicitacao','status',
    ];
}
