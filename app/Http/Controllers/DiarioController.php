<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use DataTables;
use DB;
use Auth;
use App\Diario;
use App\Viagem;

class DiarioController extends Controller
{
    public function index(){
        $usuario_logado = Auth::user()->id;

        $viagens = Viagem::where('status','Ativo')->where('fk_motorista',$usuario_logado)->get();
        return view('diario.index',compact('viagens'));
        //return view('termo.index');
    }

    public function list() {
        $Diario = Diario::orderBy('created_at', 'desc')->where('status','Ativo')->get();

        return Datatables::of($Diario)->editColumn('acao', function ($diarios){
            return $this->setBtns($diarios);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Diario $diarios){
        $dados = "data-id='$diarios->id' data-ocorrencias='$diarios->ocorrencias' data-nome_diario='$diarios->nome_diario'";
        $dadosVisualizar = "data-ocorrencias='$diarios->ocorrencias' data-nome_diario='$diarios->nome_diario'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Diario' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Diario' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Diario' data-id='$diarios->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome_diario' => 'required|min:3|max:45',
              'fk_viagem' => 'required',
              'ocorrencias' => 'required|min:3|max:45',
        );
        $attributeNames = array(
            'ocorrencias' => 'Ocorrências',
            'fk_viagem' => 'Viagem',
            'nome_diario' => 'Nome',
        );
        
        $messages = array(
            'same' => 'Essas senhas não coincidem.',
            
        ); 
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Diario = new Diario();
            $Diario->nome_diario = $request->nome_diario;
            $Diario->ocorrencias = $request->ocorrencias;
            $Diario->fk_viagem = $request->fk_viagem;
            $Diario->status = "Ativo";
            $Diario->save();
            //$Diario->setAttribute('titulo', $Diario->titulo);
            //$Diario->setAttribute('descricao', $Diario->descricao);
            return response()->json($Diario);
        }
    }


    public function update(Request $request)
    {
        $rules = array(
            'ocorrencias' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Diario = Diario::find($request->id);
            $Diario->nome_diario = $request->nome_diario;
            $Diario->ocorrencias = $request->ocorrencias;
            $Diario->fk_viagem = $request->fk_viagem;
            $Diario->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Diario);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Diario = Diario::find($request->id);
        $Diario->status = "Inativo";
        $Diario->save();
        return response()->json($Diario);
    }


}
