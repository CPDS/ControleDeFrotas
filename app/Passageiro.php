<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    /* protected $fillable=[
    	'nome','matricula',
    ]; */

    public function viagem(){

      return $this->belongsTo(Viagem::class, 'fk_solicitacao');
    }
}
