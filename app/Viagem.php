<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable=[
      'numero_rv', 'setor_emissor_rv', 'fk_veiculo', 'datahora_saida', 'datahora_chegada',
      'status', 'fk_cidade_saida', 'fk_cidade_chegada', 'fk_tipo_servico', 'fk_id_solicitante',
      'estimativa_km', 'nome_responsavel', 'telefone_responsavel','local_saida','setor_autoriza_viagem','numero_passageiros','tipo_solicitacao',
      'natureza_servico','custo_viagem','descricao_bagagem','codigo_acp_rv'
  ];
    //criar um array com os campos que podem ser preenchidos no banco
}
