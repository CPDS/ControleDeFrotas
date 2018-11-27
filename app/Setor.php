<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    public function campus(){
        return $this->belongsTo(Campus::class,'fk_campus');
      }
    protected $fillable=[
        'nome_setor','fk_campus',
    ];
}
