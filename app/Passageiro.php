<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $fillable=[
    	'nome','viagem_id'
    ];
}
