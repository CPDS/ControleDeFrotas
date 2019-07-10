<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liberacao extends Model
{
    public function motorista(){
        return $this->belongsTo(Motorista::class,'fk_motorista');
    }
    public function veiculo(){
    return $this->belongsTo(Veiculo::class,'fk_veiculo');
    }
    protected $fillable=[
        'titulo','destino','retorno','fk_veiculo','fk_motorista','datahora_saida', 'datahora_chegada'
    ];
}