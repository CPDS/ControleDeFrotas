<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    public function index(){
        return view('passageiro.index');
    }

    public function list() {
        $Passageiro = Passageiro::orderBy('created_at', 'desc')->get();

        return Datatables::of($Passageiro)->editColumn('acao', function ($passageiros){
        	return $this->setBtns($passageiros);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Passageiro $passageiros){
    	$dados = "data-id='$passageiros->id' data-nome='$passageiros->nome' data-matricula='$passageiros->matricula'";
        $dadosVisualizar = "data-nome='$passageiros->nome' data-matricula='$passageiros->matricula";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Passageiro' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Passageiro' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Passageiro' data-id='$passageiros->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome' => 'required',
              'matricula' => 'required'
        );
        $attributeNames = array(
            'nome' => 'Nome',
            'matricula' => 'Matricula'

        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Passageiro = new Passageiro();
            $Passageiro->nome = $request->nome;
            $Passageiro->matricula = $request->matricula;
            $Passageiro->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Veiculo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome' => 'required',
            'matricula' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Passageiro = Veiculo::find($request->id);
            $Passageiro->nome = $request->nome;
            $Passageiro->matricula = $request->matricula;
            $Passageiro->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Passageiro);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Passageiro = Passageiro::find($request->id);
        $Passageiro->status = "Inativo";
        $Passageiro->save();
        return response()->json($Passageiro);
    }
}
