<?php
// Controlador referente a Viagem
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use DataTables;
use DB;
use Auth;
use App\Viagem;


class ViagemController extends Controller
{
    public function index(){
        return view('viagem.index');
    }

    public function list() {
        $Viagem = Viagem::orderBy('created_at', 'desc')->get();

        return Datatables::of($Viagem)->editColumn('acao', function ($viagems){
        	return $this->setBtns($viagems);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Viagem $viagems){
      $data_saida = substr($viagems->data_saida, 0, 10);
      $data_hora = substr($viagems->data_saida, 11, 8);
      $data_chegada = substr($viagems->data_chegada, 0, 10);
      $data_criado_em = substr($viagems->criado_em, 0, 10);
      $data_atualizado_em = substr($viagems->atualizado_em, 0, 10); // quebrar a string de hora e data

    	$dados = "data-id='$viagems->id' data-numero_rv='$viagems->numero_rv' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$viagems->fk_veiculo'
      data-datahora_saida='$viagems->datahora_saida' data-datahora_chegada='$viagems->datahora_chegada' data-status='$viagems->status' data-fk_cidade_saida='$viagems->fk_cidade_saida'
      data-fk_cidade_chegada='$viagems->fk_cidade_chegada' data-fk_tipo_servico='$viagems->fk_tipo_servico' data-fk_id_solicitante='$viagems->fk_id_solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel'  data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' ";

      $dadosEditar = "data-id='$viagems->id' data-numero_rv='$viagems->numero_rv' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$viagems->fk_veiculo'
      data-datahora_saida='$viagems->datahora_saida' data-datahora_chegada='$viagems->datahora_chegada' data-status='$viagems->status' data-fk_cidade_saida='$viagems->fk_cidade_saida'
      data-fk_cidade_chegada='$viagems->fk_cidade_chegada' data-fk_tipo_servico='$viagems->fk_tipo_servico' data-fk_id_solicitante='$viagems->fk_id_solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel' data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' ";

      $dadosVisualizar = "data-numero_rv='$viagems->numero_rv' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$viagems->fk_veiculo'
      data-datahora_saida='$viagems->datahora_saida' data-datahora_chegada='$viagems->datahora_chegada' data-status='$viagems->status' data-fk_cidade_saida='$viagems->fk_cidade_saida'
      data-fk_cidade_chegada='$viagems->fk_cidade_chegada' data-fk_tipo_servico='$viagems->fk_tipo_servico' data-fk_id_solicitante='$viagems->fk_id_solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel' data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' ";

    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Viagem' $dados ><i class='fa fa-eye'></i></a> ";

    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Viagem' $dados><i class ='fa fa-pencil'></i></a> ";

      $btnVaga = "<a class='btn btn-primary btn-sm btnVaga' title='Solicitar Vaga' $dados><i class ='fa fa-plus'></i></a>";

    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Viagem' data-id='$viagems->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnVaga.$btnDeletar;
    }

    public function store(Request $request) { // cadastro de viagem
      //dd($request->all());
        $rules = array(
              'numero_rv' => 'required',
              'setor_emissor_rv' => 'required',
              'fk_veiculo' => 'required',
              'datahora_saida' => 'required',
              'datahora_chegada' => 'required',
              'status' => 'required',
              'fk_cidade_saida' => 'required',
              //'status' => 'required',
              'fk_cidade_chegada' => 'required',
              'fk_tipo_servico' => 'required',
              'fk_id_solicitante' => 'required',
              'estimativa_km' => 'required',
              'nome_responsavel' => 'required',
              'telefone_responsavel' => 'required',
              'local_saida' => 'required',
              'setor_autoriza_viagem' => 'required',
              'numero_passageiros' => 'required',
              'tipo_solicitacao' => 'required',
              'natureza_servico' => 'required',
              'custo_viagem' => 'required',
              'descricao_bagagem' => 'required',
              'codigo_acp_rv' => 'required',
        );
        $attributeNames = array(
            'numero_rv' => 'Nº RV',
            'setor_emissor_rv' => 'Setor Emissor',
            'fk_veiculo' => 'Veículo',
            'datahora_saida' => 'Saída',
            'datahora_chegada' => 'Chegada',
            'status' => 'Status',
            'fk_cidade_saida' => 'Cidade Saída',
            //'status' => 'Status',
            'fk_cidade_chegada' => 'Cidade Chegada',
            'fk_tipo_servico' => 'Tipo Serviço',
            'fk_id_solicitante' => 'Solicitante',
            'estimativa_km' => 'Estimativa Km',
            'nome_responsavel' => 'Responsável',
            'telefone_responsavel' => 'Tel Responsável',
            'local_saida' => 'Local Saída',
            'setor_autoriza_viagem' => 'Setor Autoriza',
            'numero_passageiros' => 'Nº Passag',
            'tipo_solicitacao' => 'Tipo Solicitação',
            'natureza_servico' => 'Natureza Serviço',
            'custo_viagem' => 'Custo Viagem',
            'descricao_bagagem' => 'Descrição Bagagem',
            'codigo_acp_rv' => 'Cód ACP',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Viagem = new Viagem();
            $Viagem->numero_rv = $request->numero_rv; // banco = html ~tag~ | mudar conforma tá o banco de viagem
            $Viagem->setor_emissor_rv = $request->setor_emissor_rv;
            $Viagem->fk_veiculo = $request->fk_veiculo;
            $Viagem->datahora_saida = $request->datahora_saida;
            $Viagem->datahora_chegada = $request->datahora_chegada;
            $Viagem->fk_cidade_saida = $request->fk_cidade_saida;
            $Viagem->status = 'Ativo';
            $Viagem->fk_cidade_chegada = $request->fk_cidade_chegada;
            $Viagem->fk_tipo_servico = $request->fk_tipo_servico;
            $Viagem->fk_id_solicitante = $request->fk_id_solicitante;
            $Viagem->estimativa_km = $request->estimativa_km;
            $Viagem->nome_responsavel = $request->nome_responsavel;
            $Viagem->telefone_responsavel = $request->telefone_responsavel;
            $Viagem->local_saida = $request->local_saida;
            $Viagem->setor_autoriza_viagem = $request->setor_autoriza_viagem;
            $Viagem->numero_passageiros = $request->numero_passageiros;
            $Viagem->tipo_solicitacao = $request->tipo_solicitacao;
            $Viagem->natureza_servico = $request->natureza_servico;
            $Viagem->custo_viagem = $request->custo_viagem;
            $Viagem->descricao_bagagem = $request->descricao_bagagem;
            $Viagem->codigo_acp_rv = $request->codigo_acp_rv;
            $Viagem->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Viagem); // mudar para viagem
        }
    }

    public function update(Request $request) // atualização de info
    {
        $rules = array(
            'numero_rv' => 'required',
            'setor_emissor_rv' => 'required',
            'fk_veiculo' => 'required',
            'datahora_saida' => 'required',
            'datahora_chegada' => 'required',
            'status' => 'required',
            'fk_cidade_saida' => 'required',
            //'status' => 'required',
            'fk_cidade_chegada' => 'required',
            'fk_tipo_servico' => 'required',
            'fk_id_solicitante' => 'required',
            'estimativa_km' => 'required',
            'nome_responsavel' => 'required',
            'telefone_responsavel' => 'required',
            'local_saida' => 'required',
            'setor_autoriza_viagem' => 'required',
            'numero_passageiros' => 'required',
            'tipo_solicitacao' => 'required',
            'natureza_servico' => 'required',
            'custo_viagem' => 'required',
            'descricao_bagagem' => 'required',
            'codigo_acp_rv' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Viagem = Viagem::find($request->id);
            $Viagem->numero_rv = $request->numero_rv; // banco = html ~tag~ | mudar conforma tá o banco de viagem
            $Viagem->setor_emissor_rv = $request->setor_emissor_rv;
            $Viagem->fk_veiculo = $request->fk_veiculo;
            $Viagem->datahora_saida = $request->datahora_saida;
            $Viagem->datahora_chegada = $request->datahora_chegada;
            $Viagem->fk_cidade_saida = $request->fk_cidade_saida;
            //$Viagem->status = 'Ativo';
            $Viagem->fk_cidade_chegada = $request->fk_cidade_chegada;
            $Viagem->fk_tipo_servico = $request->fk_tipo_servico;
            $Viagem->fk_id_solicitante = $request->fk_id_solicitante;
            $Viagem->estimativa_km = $request->estimativa_km;
            $Viagem->nome_responsavel = $request->nome_responsavel;
            $Viagem->telefone_responsavel = $request->telefone_responsavel;
            $Viagem->local_saida = $request->local_saida;
            $Viagem->setor_autoriza_viagem = $request->setor_autoriza_viagem;
            $Viagem->numero_passageiros = $request->numero_passageiros;
            $Viagem->tipo_solicitacao = $request->tipo_solicitacao;
            $Viagem->natureza_servico = $request->natureza_servico;
            $Viagem->custo_viagem = $request->custo_viagem;
            $Viagem->descricao_bagagem = $request->descricao_bagagem;
            $Viagem->codigo_acp_rv = $request->codigo_acp_rv;
            $Viagem->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Viagem); // editar para viagem
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) { // deletar
        $Viagem = Viagem::find($request->id);
        $Viagem->status = "Inativo";
        $Viagem->save();
        return response()->json($Viagem);
    }

    //Select Cidade
    public function selectCidade(Request $request){
        //consulta no banco
        $dados_cidades = Cidade::where('fk_estado',$request->estado)
        ->select('id','nome')
        ->orderBy('nome')
        ->get();
        //Array de cidade
        $cidades = array();
        foreach($dados_cidades as $dados_cidade){
            array_push($cidades,[
                'id' => $dados_cidade->id,
                'nome' => $dados_cidade->nome
            ]);
        }
        //retornando para o javascript
        return response()->json(['cidades' => $cidades]);
        
    }

    public static function equipamento_reservado($data_retirada, $data_entrega){
        //convertendo para formato americano
        $data_retirada = date('Y-m-d H:i:s',strtotime($data_retirada));
        $data_entrega = date('Y-m-d H:i:s',strtotime($data_entrega));
         
        //Todos os equipamentos ocupados no dia escolhido + hora inicial + hora final das reservas
        $consulta = 'select equipamento_reservas.id_equipamento,
        reservas.data_retirada,reservas.data_entrega,
        equipamento_reservas.status from equipamentos join equipamento_reservas
        on equipamento_reservas.id_equipamento = equipamentos.id
        join reservas on equipamento_reservas.id_reserva = reservas.id
        where ? between data_retirada and data_entrega or ? between data_retirada and data_entrega
        or data_retirada >= ? and data_entrega <= ? and reservas.status = ?
        and equipamento_reservas.status = ? or reservas.status = ?';
        
        //Associando atributos e executando a consulta sql  
        $Reservados = DB::select($consulta,[
            $data_retirada,
            $data_entrega,
            $data_retirada,
            $data_entrega,
            'Reservado',
            'Ativo',
            'Retirada'
        ]);
        return $Reservados;
    }
}
