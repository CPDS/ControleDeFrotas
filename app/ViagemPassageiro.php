<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViagemPassageiro extends Model
{
  protected $fillable=[
    'nome', 'matricula', 'status'
];
}
