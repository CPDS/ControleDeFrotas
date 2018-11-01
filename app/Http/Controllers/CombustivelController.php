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
class CombustivelController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        //$testecontrato = Contrato::where('status','Ativo')->get();
        return view('combustivel.index');
        //return view('termo.index');
    }

    public function list() {
        $Combustivel = Combustivel::orderBy('created_at', 'desc')->get();

        return Datatables::of($Combustivel)->editColumn('acao', function ($combustivels){
            return $this->setBtns($combustivels);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Combustivel $combustivels){
        $dados = "data-id='$combustivels->id' data-valor_litro='$combustivels->valor_litro' data-nome='$combustivels->nome'";
        $dadosVisualizar = "data-valor_litro='$combustivels->valor_litro' data-nome='$combustivels->nome'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Combustivel' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Combustivel' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Combustivel' data-id='$combustivels->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'valor_litro' => 'required',
              'nome' => 'required',
              
        );
        $attributeNames = array(
            'valor_litro' => 'Início',
            'nome' => 'Término',
            
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Combustivel = new Combustivel();
            $Combustivel->valor_litro = $request->valor_litro;
            $Combustivel->nome = $request->nome;
            
            $Combustivel->status = "Ativo";
            $Combustivel->save();
            //$Combustivel->setAttribute('titulo', $Combustivel->titulo);
            //$Combustivel->setAttribute('descricao', $Combustivel->descricao);
            return response()->json($Combustivel);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'valor_litro' => 'required',
            'nome' => 'required',
            
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Combustivel = Combustivel::find($request->id);
            $Combustivel->valor_litro = $request->valor_litro;
            $Combustivel->nome = $request->nome;
            
            $Combustivel->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Combustivel);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Combustivel = Combustivel::find($request->id);
        $Combustivel->status = "Inativo";
        $Combustivel->save();
        return response()->json($Combustivel);
    }
}
