<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Contrato;
use App\Termo;

class TermoController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        $testecontrato = Contrato::where('status','Ativo')->get();
        $valores = Termo::where('status', 'Ativo')->get();
        return view('termo.index', compact('testecontrato', 'valores'));
        //return view('termo.index');
    }

    public function list() {
        $Termo = Termo::orderBy('created_at', 'desc')->get();

        return Datatables::of($Termo)->editColumn('acao', function ($termos){
            return $this->setBtns($termos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Termo $termos){
        $dados = "data-id='$termos->id' data-data_inicio='$termos->data_inicio' data-data_termino='$termos->data_termino' data-valor='$termos->valor'";
        $dadosVisualizar = "data-data_inicio='$termos->data_inicio' data-data_termino='$termos->data_termino' data-valor='$termos->valor'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Termo' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Termo' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Termo' data-id='$termos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'data_inicio' => 'required',
              'data_termino' => 'required',
              'fk_contrato' => 'required',
              'valor' => 'required',
        );
        $attributeNames = array(
            'data_inicio' => 'Início',
            'data_termino' => 'Término',
            'fk_contrato' => 'Contrato',
            'valor' => 'Valor',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Termo = new Termo();
            $Termo->data_inicio = $request->data_inicio;
            $Termo->data_termino = $request->data_termino;
            $Termo->fk_contrato = $request->fk_contrato;
            $Termo->valor = $request->valor;
            $Termo->status = "Ativo";
            $Termo->save();
            //$Termo->setAttribute('titulo', $Termo->titulo);
            //$Termo->setAttribute('descricao', $Termo->descricao);
            return response()->json($Termo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'data_inicio' => 'required',
            'data_termino' => 'required',
            'fk_contrato' => 'required',
            'valor' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Termo = Termo::find($request->id);
            $Termo->data_inicio = $request->data_inicio;
            $Termo->data_termino = $request->data_termino;
            $Termo->fk_contrato = $request->fk_contrato;
            $Termo->valor = $request->valor;
            $Termo->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Termo);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Termo = Termo::find($request->id);
        $Termo->status = "Inativo";
        $Termo->save();
        return response()->json($Termo);
    }
}
