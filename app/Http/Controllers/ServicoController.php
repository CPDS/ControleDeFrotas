<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\Contrato;
use App\User;
use App\Servico;
use Validator;
use Response;
use DataTables;
use DB;
use Auth;

class ServicoController extends Controller
{
    public function index(){
        $veiculos = Veiculo::select('nome_veiculo','id')->get();
        $contratos = Contrato::select('empresa_contratada_nome','id')->get();
        $motoristas = User::role('Motorista')->get();
        return view('servico.index',compact('veiculos','contratos','motoristas'));
    }

    public function list() {
        $Servico = Servico::orderBy('created_at', 'desc')->where('status','Ativo')->get();

        return Datatables::of($Servico)->editColumn('acao', function ($servicos){
        	return $this->setBtns($servicos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Servico $servicos){
    	$dados = "data-id='$servicos->id' data-fk_veiculo='$servicos->fk_veiculo' data-fk_contrato='$servicos->fk_contrato' data-valor_derivados='$servicos->valor_derivados' data-valor_pecas='$servicos->valor_pecas' data-valor_servico='$servicos->valor_servico' data-valor_smv='$servicos->valor_smv' data-numero_ordem_servico='$servicos->numero_ordem_servico' data-data_servico='$servicos->data_servico' data-fk_motorista='$servicos->fk_motorista' data-km_entrada_oficina='$servicos->km_entrada_oficina' data-tipo_servico_manutencao='$servicos->tipo_servico_manutencao' data-numero_smv='$servicos->numero_smv' data-numero_lupus='$servicos->numero_lupus' data-numero_sei='$servicos->numero_sei' data-numero_empenho='$servicos->numero_empenho' data-data_envio_pedido_empenho='$servicos->data_envio_pedido_empenho' data-numero_nf='$servicos->numero_nf' data-data_pg_nob='$servicos->data_pg_nob' data-numero_nob='$servicos->numero_nob' data-valor_empenho='$servicos->valor_empenho' data-valor_pago='$servicos->valor_pago' data-descricao_geral_servico='$servicos->descricao_geral_servico'";
        $dadosVisualizar = "data-fk_veiculo='$servicos->fk_veiculo' data-fk_contrato='$servicos->fk_contrato' data-valor_derivados='$servicos->valor_derivados' data-valor_pecas='$servicos->valor_pecas' data-valor_servico='$servicos->valor_servico' data-valor_smv='$servicos->valor_smv' data-numero_ordem_servico='$servicos->numero_ordem_servico' data-data_servico='$servicos->data_servico' data-fk_motorista='$servicos->fk_motorista' data-km_entrada_oficina='$servicos->km_entrada_oficina' data-tipo_servico_manutencao='$servicos->tipo_servico_manutencao' data-numero_smv='$servicos->numero_smv' data-numero_lupus='$servicos->numero_lupus' data-numero_sei='$servicos->numero_sei' data-numero_empenho='$servicos->numero_empenho' data-data_envio_pedido_empenho='$servicos->data_envio_pedido_empenho' data-numero_nf='$servicos->numero_nf' data-data_pg_nob='$servicos->data_pg_nob' data-numero_nob='$servicos->numero_nob' data-valor_empenho='$servicos->valor_empenho' data-valor_pago='$servicos->valor_pago' data-descricao_geral_servico='$servicos->descricao_geral_servico'";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Serviço' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Serviço' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Serviço' data-id='$servicos->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'fk_veiculo' => 'required',
              'fk_contrato' => 'required',
              'valor_derivados' => 'required',
              'valor_pecas' => 'required',
              'valor_servico' => 'required',
              'valor_smv' => 'required',
              'numero_ordem_servico' => 'required',
              'data_servico' => 'required',
              'fk_motorista' => 'required',
              'km_entrada_oficina' => 'required',
              'tipo_servico_manutencao' => 'required',
              'numero_smv' => 'required',
              'numero_lupus' => 'required',
              'numero_sei' => 'required',
              'numero_empenho' => 'required',
              'data_envio_pedido_empenho' => 'required',
              'numero_nf' => 'required',
              'data_pg_nob' => 'required',
              'numero_nob' => 'required',
              'valor_empenho' => 'required',
              'valor_pago' => 'required',
              'descricao_geral_servico' => 'required',
        );
        $attributeNames = array(
            'fk_veiculo' => 'Veículo',
            'fk_contrato' => 'Contrato',
            'valor_derivados' => 'R$ Derivados',
            'valor_pecas' => 'R$ Peças',
            'valor_servico' => 'R$ Serviço',
            'valor_smv' => 'R$ SMV',
            'numero_ordem_servico' => 'Nº Ordem Serviço',
            'data_servico' => 'Data Serviço',
            'fk_motorista' => 'Motorista',
            'km_entrada_oficina' => 'Km Entrada Oficina',
            'tipo_servico_manutencao' => 'Tipo Manutenção',
            'numero_smv' => 'Nº SMV',
            'numero_lupus' => 'Nº Lupus',
            'numero_sei' => 'Nº SEI',
            'numero_empenho' => 'Nº empenho',
            'data_envio_pedido_empenho' => 'Data Envio Empenho',
            'numero_nf' => 'Nº Nota Fiscal',
            'data_pg_nob' => 'Data Pagamento NOB',
            'numero_nob' => 'Nº NOB',
            'valor_empenho' => 'R$ Empenho',
            'valor_pago' => 'Valor Total Pago',
            'descricao_geral_servico' => 'Descrição do Serviço',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Servico = new Servico();
            $Servico->fk_veiculo = $request->fk_veiculo;
            $Servico->fk_contrato = $request->fk_contrato;
            $Servico->valor_derivados = $request->valor_derivados;
            $Servico->valor_pecas = $request->valor_pecas;
            $Servico->valor_servico = $request->valor_servico;
            $Servico->valor_smv = $request->valor_smv;
            $Servico->numero_ordem_servico = $request->numero_ordem_servico;
            $Servico->data_servico = $request->data_servico;
            $Servico->fk_motorista = $request->fk_motorista;
            $Servico->km_entrada_oficina = $request->km_entrada_oficina;
            $Servico->tipo_servico_manutencao = $request->tipo_servico_manutencao;
            $Servico->numero_smv = $request->numero_smv;
            $Servico->numero_lupus = $request->numero_lupus;
            $Servico->numero_sei = $request->numero_sei;
            $Servico->numero_empenho = $request->numero_empenho;
            $Servico->data_envio_pedido_empenho = $request->data_envio_pedido_empenho;
            $Servico->numero_nf = $request->numero_nf;
            $Servico->data_pg_nob = $request->data_pg_nob;
            $Servico->numero_nob = $request->numero_nob;
            $Servico->valor_empenho = $request->valor_empenho;
            $Servico->valor_pago = $request->valor_pago;
            $Servico->descricao_geral_servico = $request->descricao_geral_servico;
            $Servico->status = "Ativo";
            $Servico->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Veiculo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'fk_veiculo' => 'required',
            'fk_contrato' => 'required',
            'valor_derivados' => 'required',
            'valor_pecas' => 'required',
            'valor_servico' => 'required',
            'valor_smv' => 'required',
            'numero_ordem_servico' => 'required',
            'data_servico' => 'required',
            'fk_motorista' => 'required',
            'km_entrada_oficina' => 'required',
            'tipo_servico_manutencao' => 'required',
            'numero_smv' => 'required',
            'numero_lupus' => 'required',
            'numero_sei' => 'required',
            'numero_empenho' => 'required',
            'data_envio_pedido_empenho' => 'required',
            'numero_nf' => 'required',
            'data_pg_nob' => 'required',
            'numero_nob' => 'required',
            'valor_empenho' => 'required',
            'valor_pago' => 'required',
            'descricao_geral_servico' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Servico = Servico::find($request->id);
            $Servico->fk_veiculo = $request->fk_veiculo;
            $Servico->fk_contrato = $request->fk_contrato;
            $Servico->valor_derivados = $request->valor_derivados;
            $Servico->valor_pecas = $request->valor_pecas;
            $Servico->valor_servico = $request->valor_servico;
            $Servico->valor_smv = $request->valor_smv;
            $Servico->numero_ordem_servico = $request->numero_ordem_servico;
            $Servico->data_servico = $request->data_servico;
            $Servico->fk_motorista = $request->fk_motorista;
            $Servico->km_entrada_oficina = $request->km_entrada_oficina;
            $Servico->tipo_servico_manutencao = $request->tipo_servico_manutencao;
            $Servico->numero_smv = $request->numero_smv;
            $Servico->numero_lupus = $request->numero_lupus;
            $Servico->numero_sei = $request->numero_sei;
            $Servico->numero_empenho = $request->numero_empenho;
            $Servico->data_envio_pedido_empenho = $request->data_envio_pedido_empenho;
            $Servico->numero_nf = $request->numero_nf;
            $Servico->data_pg_nob = $request->data_pg_nob;
            $Servico->numero_nob = $request->numero_nob;
            $Servico->valor_empenho = $request->valor_empenho;
            $Servico->valor_pago = $request->valor_pago;
            $Servico->descricao_geral_servico = $request->descricao_geral_servico;
            $Servico->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Servico);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Servico = Servico::find($request->id);
        $Servico->status = "Inativo";
        $Servico->save();
        return response()->json($Servico);
    }
}
