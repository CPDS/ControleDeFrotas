<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable=[
      'numero_rv', 'roteiro_id', 'setor_nome'. 'morotista_id', 'veiculo_id',
      'data_saida', 'data_chegada', 'status', 'criado_em', 'atualizada_em',
      'cidade_saida', 'cidade_chegada', 'situacao'
  ];
    //criar um array com os campos que podem ser preenchidos no banco
}
