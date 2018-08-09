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

    	$dados = "data-id='$viagems->id' data-numero_rv='$viagems->numero_rv' data-roteiro_id='$viagems->roteiro_id' data-setor_nome='$viagems->setor_nome'
      data-motorista_id='$viagems->motorista_id' data-veiculo_id='$viagems->veiculo_id' data-data_saida='$viagems->data_saida' data-data_chegada='$viagems->data_chegada'
      data-status='$viagems->status' data-criado_em='$viagems->criado_em' data-atualizado_em='$viagems->atualizado_em' data-cidade_saida='$viagems->cidade_saida'
      data-cidade_chegada='$viagems->cidade_chegada' data-situacao='$viagems->situacao' ";

      $dadosEditar = "data-id='$viagems->id' data-numero_rv='$viagems->numero_rv' data-roteiro_id='$viagems->roteiro_id' data-setor_nome='$viagems->setor_nome'
      data-motorista_id='$viagems->motorista_id' data-veiculo_id='$viagems->veiculo_id' data-data_saida='$data_saida' data-data_chegada='$data_chegada'
      data-status='$viagems->status' data-criado_em='$data_criado_em' data-atualizado_em='$data_atualizado_em' data-cidade_saida='$viagems->cidade_saida'
      data-cidade_chegada='$viagems->cidade_chegada' data-situacao='$viagems->situacao' ";

      $dadosVisualizar = "data-numero_rv='$viagems->numero_rv' data-roteiro_id='$viagems->roteiro_id' data-setor_nome='$viagems->setor_nome'
      data-motorista_id='$viagems->motorista_id' data-veiculo_id='$viagems->veiculo_id' data-data_saida='$viagems->data_saida' data-data_chegada='$viagems->data_chegada'
      data-status='$viagems->status' data-criado_em='$viagems->criado_em' data-atualizado_em='$viagems->atualizado_em' data-cidade_saida='$viagems->cidade_saida'
      data-cidade_chegada='$viagems->cidade_chegada' data-situacao='$viagems->situacao' ";

    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Viagem' $dados ><i class='fa fa-eye'></i></a> ";

    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Viagem' $dadosEditar><i class ='fa fa-pencil'></i></a> ";

    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Viagem' data-id='$viagems->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) { // cadastro de viagem
      //dd($request->all());
        $rules = array(
              'numero_rv' => 'required',
              'roteiro_id' => 'required',
              'setor_nome' => 'required',
              'motorista_id' => 'required',
              'veiculo_id' => 'required',
              'data_saida' => 'required',
              'data_chegada' => 'required',
              //'status' => 'required',
              'cidade_saida' => 'required',
              'cidade_chegada' => 'required'
        );
        $attributeNames = array(
            'numero_rv' => 'Nº RV',
            'roteiro_id' => 'Roteiro',
            'setor_nome' => 'Setor',
            'motorista_id' => 'Motorista',
            'veiculo_id' => 'Veículo',
            'data_saida' => 'Data de Saída',
            'data_chegada' => 'Data de Chegada',
            //'status' => 'Status',
            'criado_em' => 'Criado em',
            'atualizado_em' => 'Atualizado em',
            'cidade_saida' => 'Cidade de Saída',
            'cidade_chegada' => 'Cidade de Chegada'

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
            $Viagem->roteiro_id = $request->roteiro_id;
            $Viagem->setor_nome = $request->setor_nome;
            $Viagem->motorista_id = $request->motorista_id;
            $Viagem->veiculo_id = $request->veiculo_id;
            $Viagem->data_saida = $request->data_saida;
            $Viagem->data_chegada = $request->data_chegada;
            $Viagem->status = 'Ativo';
            $Viagem->criado_em = $request->criado_em;
            $Viagem->atualizado_em = $request->atualizado_em;
            $Viagem->cidade_saida = $request->cidade_saida;
            $Viagem->cidade_chegada = $request->cidade_chegada;
            $Viagem->status = "Ativo";
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
          'roteiro_id' => 'required',
          'setor_nome' => 'required',
          'motorista_id' => 'required',
          'veiculo_id' => 'required',
          'data_saida' => 'required',
          'data_chegada' => 'required',
          //'status' => 'required',
          'cidade_saida' => 'required',
          'cidade_chegada' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Viagem = Viagem::find($request->id);
            $Viagem->numero_rv = $request->numero_rv; // banco = html ~tag~ | mudar conforma tá o banco de viagem
            $Viagem->roteiro_id = $request->roteiro_id;
            $Viagem->setor_nome = $request->setor_nome;
            $Viagem->motorista_id = $request->motorista_id;
            $Viagem->veiculo_id = $request->veiculo_id;
            $Viagem->data_saida = $request->data_saida;
            $Viagem->data_chegada = $request->data_chegada;
            //$Viagem->status = $request->status;
            $Viagem->criado_em = $request->criado_em;
            $Viagem->atualizado_em = $request->atualizado_em;
            $Viagem->cidade_saida = $request->cidade_saida;
            $Viagem->cidade_chegada = $request->cidade_chegada;
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
}
