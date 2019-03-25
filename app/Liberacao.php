<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liberacao extends Model
{
    protected $fillable=[
        'titulo','destino','retorno','fk_veiculo','fk_motorista','datahora_saida', 'datahora_chegada'
    ];
}
