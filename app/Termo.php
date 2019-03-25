<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    public function contrato(){
        return $this->belongsTo(Contrato::class,'fk_contrato');
      }
    protected $fillable=[
        'data_inicio','data_termino','valor',
    ];

   
}
