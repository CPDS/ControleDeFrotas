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

class ContratoController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        return view('contrato.index');
    }

    public function list() {
        $Contrato = Contrato::orderBy('created_at', 'desc')->where('status','Ativo')->get();
        //dd($Contrato);
        return Datatables::of($Contrato)->editColumn('acao', function ($contratos){
            return $this->setBtns($contratos);
        })
        ->editColumn('data_inicio_contrato', function($contratos){
            return date("d/m/y",strtotime($contratos->data_inicio_contrato));
        })
        ->editColumn('data_vencimento_contrato', function($contratos){
            return date("d/m/y",strtotime($contratos->data_vencimento_contrato));
        })
        ->escapeColumns([0])->make(true);
    }

    private function setBtns(Contrato $contratos){
        $dados = "data-id='$contratos->id' data-empresa_contratada_nome='$contratos->empresa_contratada_nome' data-empresa_contratada_cnpj='$contratos->empresa_contratada_cnpj' data-numero_contrato='$contratos->numero_contrato' data-data_inicio_contrato='$contratos->data_inicio_contrato' data-data_vencimento_contrato='$contratos->data_vencimento_contrato' data-valor_contratado='$contratos->valor_contratado' data-tipo='$contratos->tipo'";
        $dadosVisualizar = "data-empresa_contratada_empresa_contratada_nome='$contratos->empresa_contratada_empresa_contratada_nome' data-empresa_contratada_cnpj='$contratos->empresa_contratada_cnpj' data-numero_contrato='$contratos->numero_contrato' data-data_inicio_contrato='$contratos->data_inicio_contrato' data-data_vencimento_contrato='$contratos->data_vencimento_contrato' data-valor_contratado='$contratos->valor_contratado' data-tipo='$contratos->tipo'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Contrato' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Contrato' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Contrato' data-id='$contratos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'empresa_contratada_nome' => 'required',
              'empresa_contratada_cnpj' => 'required',
              'numero_contrato' => 'required',
              'data_inicio_contrato' => 'required',
              'data_vencimento_contrato' => 'required',
              'valor_contratado' => 'required',
              'tipo' => 'required',

        );
        $attributeNames = array(
            'empresa_contratada_nome' => 'Nome Empresa',
            'empresa_contratada_cnpj' => 'CNPJ',
            'numero_contrato' => 'Nº Contrato',
            'data_inicio_contrato' => 'Início',
            'data_vencimento_contrato' => 'Vencimento',
            'valor_contratado' => 'Valor',
            'tipo' => 'Tipo',


        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Contrato = new Contrato();
            $Contrato->empresa_contratada_nome = $request->empresa_contratada_nome;
            $Contrato->empresa_contratada_cnpj = $request->empresa_contratada_cnpj;
            $Contrato->numero_contrato = $request->numero_contrato;
            $Contrato->data_inicio_contrato = $request->data_inicio_contrato;
            $Contrato->data_vencimento_contrato = $request->data_vencimento_contrato;
            $Contrato->valor_contratado = $request->valor_contratado;
            $Contrato->tipo = $request->tipo;
            $Contrato->status = "Ativo";
            $Contrato->save();
            //$Contrato->setAttribute('titulo', $Contrato->titulo);
            //$Contrato->setAttribute('descricao', $Contrato->descricao);
            return response()->json($Contrato);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'empresa_contratada_nome' => 'required',
            'empresa_contratada_cnpj' => 'required',
            'numero_contrato' => 'required',
            'data_inicio_contrato' => 'required',
            'data_vencimento_contrato' => 'required',
            'valor_contratado' => 'required',
            'tipo' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Contrato = Contrato::find($request->id);
            $Contrato->empresa_contratada_nome = $request->empresa_contratada_nome;
            $Contrato->empresa_contratada_cnpj = $request->empresa_contratada_cnpj;
            $Contrato->numero_contrato = $request->numero_contrato;
            $Contrato->data_inicio_contrato = $request->data_inicio_contrato;
            $Contrato->data_vencimento_contrato = $request->data_vencimento_contrato;
            $Contrato->valor_contratado = $request->valor_contratado;
            $Contrato->tipo = $request->tipo;
            $Contrato->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Contrato);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Contrato = Contrato::find($request->id);
        $Contrato->status = "Inativo";
        $Contrato->save();
        return response()->json($Contrato);
    }
}
