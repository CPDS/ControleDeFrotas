<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable=[
        'nome_setor','fk_campus',
    ];
}
