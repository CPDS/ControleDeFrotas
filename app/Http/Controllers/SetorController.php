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
use App\{
  Setor,
  Campus

};
class SetorController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        $campus = Campus::where('status','Ativo')->where('status','Ativo')->get();
        return view('setor.index', compact('campus'));
        //return view('termo.index');
    }

    public function list() {
        $Setor = Setor::orderBy('created_at', 'desc')->get();

        return Datatables::of($Setor)->editColumn('acao', function ($setors){
            return $this->setBtns($setors);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Setor $setors){
        $dados = "data-id='$setors->id' data-nome_setor='$setors->nome_setor' data-fk_campus='$setors->fk_campus'";
        $dadosVisualizar = "data-nome_setor='$setors->nome_setor' data-fk_campus='$setors->fk_campus'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Setor' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Setor' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Setor' data-id='$setors->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome_setor' => 'required',
              'fk_campus' => 'required',
        );
        $attributeNames = array(
            'nome_setor' => 'Nome',
            'fk_campus' => 'Campus',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Setor = new Setor();
            $Setor->nome_setor = $request->nome_setor;
            $Setor->fk_campus = $request->fk_campus;
            $Setor->status = "Ativo";
            $Setor->save();
            //$Setor->setAttribute('titulo', $Setor->titulo);
            //$Setor->setAttribute('descricao', $Setor->descricao);
            return response()->json($Setor);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome_setor' => 'required',
            'fk_campus' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Setor = Termo::find($request->id);
            $Setor->nome_setor = $request->nome_setor;
            $Setor->fk_campus = $request->fk_campus;
            $Setor->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Setor);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Setor = Termo::find($request->id);
        $Setor->status = "Inativo";
        $Setor->save();
        return response()->json($Setor);
    }
}
