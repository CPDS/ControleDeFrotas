<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiarioController extends Controller
{
    public function index(){
        return view('diario.index');
        //return view('termo.index');
    }

    public function list() {
        $Diario = Diario::orderBy('created_at', 'desc')->get();

        return Datatables::of($Diario)->editColumn('acao', function ($diarios){
            return $this->setBtns($diarios);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Diario $diarios){
        $dados = "data-id='$diarios->id' data-ocorrencias='$diarios->ocorrencias'";
        $dadosVisualizar = "data-ocorrencias='$diarios->ocorrencias'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Diario' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Diario' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Diario' data-id='$diarios->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'ocorrencias' => 'required',
        );
        $attributeNames = array(
            'ocorrencias' => 'Ocorrências',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Diario = new Diario();
            $Diario->ocorrencias = $request->ocorrencias;
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
            $Diario->ocorrencias = $request->ocorrencias;
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