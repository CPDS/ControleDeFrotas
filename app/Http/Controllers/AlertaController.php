<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        $testeveiculo = Veiculo::where('status','Ativo')->get();
        return view('alerta.index', compact('testeveiculo'));
        //return view('termo.index');
    }

    public function list() {
        $Alerta = Alerta::orderBy('created_at', 'desc')->get();

        return Datatables::of($Alerta)->editColumn('acao', function ($alertas){
            return $this->setBtns($alertas);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Alerta $alertas){
        $dados = "data-id='$alertas->id' data-datahora_alerta='$alertas->datahora_alerta' data-descricao_alerta='$alertas->descricao_alerta' data-fk_veiculo='$alertas->fk_veiculo'";
        $dadosVisualizar = "data-datahora_alerta='$alertas->datahora_alerta' data-descricao_alerta='$alertas->descricao_alerta' data-fk_veiculo='$alertas->fk_veiculo'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Alerta' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Alerta' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Alerta' data-id='$alertas->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'datahora_alerta' => 'required',
              'descricao_alerta' => 'required',
              'fk_veiculo' => 'required',
        );
        $attributeNames = array(
            'datahora_alerta' => 'Data/Hora',
            'descricao_alerta' => 'Descrição',
            'fk_veiculo' => 'Veículo',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Alerta = new Alerta();
            $Alerta->datahora_alerta = $request->datahora_alerta;
            $Alerta->descricao_alerta = $request->descricao_alerta;
            $Alerta->fk_veiculo = $request->fk_veiculo;
            $Alerta->status = "Ativo";
            $Alerta->save();
            //$Alerta->setAttribute('titulo', $Alerta->titulo);
            //$Alerta->setAttribute('descricao', $Alerta->descricao);
            return response()->json($Alerta);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'datahora_alerta' => 'required',
            'descricao_alerta' => 'required',
            'fk_veiculo' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Alerta = Alerta::find($request->id);
            $Alerta->datahora_alerta = $request->datahora_alerta;
            $Alerta->descricao_alerta = $request->descricao_alerta;
            $Alerta->fk_veiculo = $request->fk_veiculo;
            $Alerta->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Alerta);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Alerta = Alerta::find($request->id);
        $Alerta->status = "Inativo";
        $Alerta->save();
        return response()->json($Alerta);
    }


}
