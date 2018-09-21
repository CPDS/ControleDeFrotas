<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoServicoController extends Controller
{
    public function index(){
        return view('tiposervico.index');
        //return view('termo.index');
    }

    public function list() {
        $TipoServico = TipoServico::orderBy('created_at', 'desc')->get();

        return Datatables::of($TipoServico)->editColumn('acao', function ($tiposervicos){
            return $this->setBtns($tiposervicos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(TipoServico $tiposervicos){
        $dados = "data-id='$tiposervicos->id' data-nome='$tiposervicos->nome'";
        $dadosVisualizar = "data-nome='$tiposervicos->nome'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Servico' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Servico' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Servico' data-id='$tiposervicos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome' => 'required',
        );
        $attributeNames = array(
            'nome' => 'Ocorrências',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $TipoServico = new Diario();
            $TipoServico->nome = $request->nome;
            $TipoServico->status = "Ativo";
            $TipoServico->save();
            //$TipoServico->setAttribute('titulo', $TipoServico->titulo);
            //$TipoServico->setAttribute('descricao', $TipoServico->descricao);
            return response()->json($TipoServico);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Diario = Diario::find($request->id);
            $TipoServico->nome = $request->nome;
            $TipoServico->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($TipoServico);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $TipoServico = Diario::find($request->id);
        $TipoServico->status = "Inativo";
        $TipoServico->save();
        return response()->json($TipoServico);
    }
}