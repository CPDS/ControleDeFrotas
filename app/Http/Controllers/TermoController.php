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
        $Termo = Termo::orderBy('created_at', 'desc')->where('status','Ativo')->get();

        return Datatables::of($Termo)->editColumn('acao', function ($termos){
            return $this->setBtns($termos);
        })
        ->editColumn('fk_contrato', function ($termos){
            return $termos->contrato->empresa_contratada_nome;
        })
        ->editColumn('data_inicio', function($termos){
            return date("d/m/y",strtotime($termos->data_inicio));
        })
        ->editColumn('data_termino', function($termos){
            return date("d/m/y",strtotime($termos->data_termino));
        })
        ->escapeColumns([0])->make(true);
    }

    private function setBtns(Termo $termos){

        $testedata = date("d/m/y",strtotime($termos->data_inicio));
        $testedata2 = date("d/m/y",strtotime($termos->data_termino));
        $empresacontrato = $termos->contrato->empresa_contratada_nome;
        $dados = "data-id='$termos->id' data-data_inicio='$termos->data_inicio' data-data_termino='$termos->data_termino' data-valor='$termos->valor' data-fk_contrato='$empresacontrato'";
        $dadosVisualizar = "data-data_inicio='$testedata' data-data_termino='$testedata2' data-valor='$termos->valor' data-fk_contrato='$empresacontrato'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Termo' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Termo' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Termo' data-id='$termos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'data_inicio' => 'required',
              'data_termino' => 'required',
              'fk_contrato' => 'required',
              'valor' => 'required|numeric',
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
            'valor' => 'required|numeric',
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
