<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Diario;
use App\Combustivel;

class CustoController extends Controller
{
    public function index(){
        $testediario = Diario::where('status','Ativo')->get();
        $testecombustivel = Combustivel::where('status','Ativo')->get();
        return view('custo.index', compact('testediario','testecombustivel'));
    }

    public function list() {
        $Custo = Custo::orderBy('created_at', 'desc')->get();

        return Datatables::of($Custo)->editColumn('acao', function ($custos){
            return $this->setBtns($custos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Custo $custos){
        $dados = "data-id='$custos->id' data-qtd_diaria='$custos->qtd_diaria' data-valor_diaria='$custos->valor_diaria' data-custo_total_diaria='$custos->custo_total_diaria' data-valor_manutencao='$custos->valor_manutencao' data-custo_total_viagem='$custos->custo_total_viagem' data-fk_diario_bordo='$custos->fk_diario_bordo' data-fk_combustivel='$custos->fk_combustivel'";
        $dadosVisualizar = "data-qtd_diaria='$custos->qtd_diaria' data-valor_diaria='$custos->valor_diaria 'data-custo_total_diaria='$custos->custo_total_diaria' data-valor_manutencao='$custos->valor_manutencao' data-custo_total_viagem='$custos->custo_total_viagem' data-fk_diario_bordo='$custos->fk_diario_bordo' data-fk_combustivel='$custos->fk_combustivel'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Custos' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Custos' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Custos' data-id='$custos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'qtd_diaria' => 'required',
              'valor_diaria' => 'required',
              'custo_total_diaria' => 'required',
              'valor_manutencao' => 'required',
              'custo_total_viagem' => 'required',
              'fk_diario_bordo' => 'required',
              'fk_combustivel' => 'required',
              
        );
        $attributeNames = array(
            'qtd_diaria' => 'Qtd Diárias',
            'valor_diaria' => 'Valor Diária',
            'custo_total_diaria' => 'Custo das Diárias',
            'valor_manutencao' => 'Valor Manutenção',
            'custo_total_viagem' => 'Custo Total Viagem',
            'fk_diario_bordo' => 'Diário Bordo',
            'fk_combustivel' => 'Combustível',

        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Custo = new Custo();
            $Custo->qtd_diaria = $request->qtd_diaria;
            $Custo->valor_diaria = $request->valor_diaria;
            $Custo->custo_total_diaria = $request->custo_total_diaria;
            $Custo->valor_manutencao = $request->valor_manutencao;
            $Custo->custo_total_viagem = $request->custo_total_viagem;
            $Custo->fk_diario_bordo = $request->fk_diario_bordo;
            $Custo->fk_combustivel = $request->fk_combustivel;
            $Custo->status = "Ativo";
            $Custo->save();
            //$Custo->setAttribute('titulo', $Custo->titulo);
            //$Custo->setAttribute('descricao', $Custo->descricao);
            return response()->json($Custo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'qtd_diaria' => 'required',
            'valor_diaria' => 'required',
            'custo_total_diaria' => 'required',
            'valor_manutencao' => 'required',
            'custo_total_viagem' => 'required',
            'fk_diario_bordo' => 'required',
            'fk_combustivel' => 'required',
            
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Custo = Custo::find($request->id);
            $Custo->qtd_diaria = $request->qtd_diaria;
            $Custo->valor_diaria = $request->valor_diaria;
            $Custo->custo_total_diaria = $request->custo_total_diaria;
            $Custo->valor_manutencao = $request->valor_manutencao;
            $Custo->custo_total_viagem = $request->custo_total_viagem;
            $Custo->fk_diario_bordo = $request->fk_diario_bordo;
            $Custo->fk_combustivel = $request->fk_combustivel;
            
            $Custo->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Custo);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Custo = Custo::find($request->id);
        $Custo->status = "Inativo";
        $Custo->save();
        return response()->json($Custo);
    }


}
