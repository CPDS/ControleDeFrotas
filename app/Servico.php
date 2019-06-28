<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    public function veiculo(){
        return $this->belongsTo(Veiculo::class,'fk_veiculo');
    }
    public function motorista(){
        return $this->belongsTo(User::class,'fk_motorista');
    }
    public function contrato(){
        return $this->belongsTo(Contrato::class,'fk_contrato');
    }

    protected $fillable=[
    	'fk_veiculo','fk_contrato','valor_derivados','valor_pecas','valor_servico','valor_smv','numero_ordem_servico','data_servico','data_servico','fk_motorista','km_entrada_oficina','tipo_servico_manutencao','numero_smv','numero_lupus','numero_sei','numero_empenho','data_envio_pedido_empenho','numero_nf','data_pg_nob','numero_nob','valor_empenho','valor_pago','descricao_geral_servico',
    ];
}
