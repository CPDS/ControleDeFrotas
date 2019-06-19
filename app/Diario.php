<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    public function viagem(){
        return $this->belongsTo(Viagem::class,'fk_viagem');
    }

    protected $fillable=[
        'ocorrencias','fk_viagem',
    ];
}
