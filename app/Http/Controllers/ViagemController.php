<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    //Editar para viagems

    public function index(){
        return view('viagem.index');
    }
    //TEM QUE TERMINAR DE EDITAR PARA VIAGEM
    public function list() {
        $Veiculo = Veiculo::orderBy('created_at', 'desc')->get();

        return Datatables::of($Viagem)->editColumn('acao', function ($veiculos){
        	return $this->setBtns($veiculos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Veiculo $veiculos){
    	$dados = "data-id='$veiculos->id' data-nome='$veiculos->nome' data-placa='$veiculos->placa' data-tipo_combustivel='$veiculos->tipo_combustivel' ";
      $dadosVisualizar = "data-nome='$veiculos->nome' data-placa='$veiculos->placa 'data-tipo_combustivel='$veiculos->tipo_combustivel' ";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Veículo' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Veículo' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Veículo' data-id='$veiculos->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome' => 'required',
              'placa' => 'required',
              'tipo_combustivel' => 'required'
        );
        $attributeNames = array(
            'nome' => 'Nome',
            'placa' => 'Placa',
            'tipo_combustivel' => 'Tipo de Combustível'

        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Veiculo = new Veiculo();
            $Veiculo->nome = $request->nome;
            $Veiculo->placa = $request->placa;
            $Veiculo->tipo_combustivel = $request->tipo_combustivel;
            $Veiculo->status = "Ativo";
            $Veiculo->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Veiculo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome' => 'required',
            'placa' => 'required',
            'tipo_combustivel' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Veiculo = Veiculo::find($request->id);
            $Veiculo->nome = $request->nome;
            $Veiculo->placa = $request->placa;
            $Veiculo->tipo_combustivel = $request->tipo_combustivel;
            $Veiculo->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Veiculo);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Veiculo = Veiculo::find($request->id);
        $Veiculo->status = "Inativo";
        $Veiculo->save();
        return response()->json($Veiculo);
    }
}
