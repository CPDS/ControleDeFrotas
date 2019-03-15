<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    protected $fillable=[
        'ocorrencias','fk_viagem',
    ];
}
