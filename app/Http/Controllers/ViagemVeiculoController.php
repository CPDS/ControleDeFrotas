<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagemVeiculoController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        //$testesolicitacao = Viagem::where('status','Ativo')->get();
        //return view('termo.index', compact('testesolicitacao'));
        //$testeveiculo = Veiculo::where('status','Ativo')->get();
        //return view('termo.index', compact('testeveiculo','testesolicitacao'));
        //return view('termo.index');
    }

    public function list() {
        $ViagemVeiculo = ViagemVeiculo::orderBy('created_at', 'desc')->get();

        return Datatables::of($ViagemVeiculo)->editColumn('acao', function ($viagemveiculos){
            return $this->setBtns($viagemveiculos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(ViagemVeiculo $viagemveiculos){
        $dados = "data-id='$viagemveiculos->id' data-fk_solicitacao='$viagemveiculos->fk_solicitacao' data-fk_veiculo='$viagemveiculos->fk_veiculo'";
        $dadosVisualizar = "data-fk_solicitacao='$viagemveiculos->fk_solicitacao' data-fk_veiculo='$viagemveiculos->fk_veiculo'";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver ViagemVeiculo' $dados ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar ViagemVeiculo' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar ViagemVeiculo' data-id='$viagemveiculos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'fk_solicitacao' => 'required',
              'fk_veiculo' => 'required',
        );
        $attributeNames = array(
            'fk_solicitacao' => 'FK Viagem',
            'fk_veiculo' => 'FK Veiculo',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $ViagemVeiculo = new ViagemVeiculo();
            $ViagemVeiculo->fk_solicitacao = $request->fk_solicitacao;
            $ViagemVeiculo->fk_veiculo = $request->fk_veiculo;
            $ViagemVeiculo->status = "Ativo";
            $ViagemVeiculo->save();
            //$ViagemVeiculo->setAttribute('titulo', $ViagemVeiculo->titulo);
            //$ViagemVeiculo->setAttribute('descricao', $ViagemVeiculo->descricao);
            return response()->json($ViagemVeiculo);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'fk_solicitacao' => 'required',
            'fk_veiculo' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $ViagemVeiculo = ViagemVeiculo::find($request->id);
            $ViagemVeiculo->fk_solicitacao = $request->fk_solicitacao;
            $ViagemVeiculo->fk_veiculo = $request->fk_veiculo;
            $ViagemVeiculo->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($ViagemVeiculo);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $ViagemVeiculo = ViagemVeiculo::find($request->id);
        $ViagemVeiculo->status = "Inativo";
        $ViagemVeiculo->save();
        return response()->json($ViagemVeiculo);
    }
}
