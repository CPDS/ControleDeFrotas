<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BancoHoras extends Model
{
    public function motorista(){
      return $this->belongsTo(User::class,'fk_motorista');
    }
}
