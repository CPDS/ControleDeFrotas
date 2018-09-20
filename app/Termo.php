<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    protected $fillable=[
        'data_inicio','data_termino','valor',
    ];
}
