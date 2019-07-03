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
use App\Passageiro;
use App\Viagem;

class PassageiroController extends Controller
{
    public function index(){
        $viagems = Viagem::select('numero_rv', 'id','nome')->get();
        return view('passageiro.index', compact('viagems'));
    }

    public function list() {
        $Passageiro = Passageiro::orderBy('created_at', 'desc')->get();

        return Datatables::of($Passageiro)->editColumn('acao', function ($passageiros){

        	return $this->setBtns($passageiros);
        })
        ->editColumn('fk_solicitacao', function ($passageiros){
            return $passageiros->viagem->nome;
        })
        ->escapeColumns([0])->make(true);
    }

    private function setBtns(Passageiro $passageiros){
        /*
        nome_passageiro' => 'required|min:3|max:45',
        'matricula' => 'required|numeric',
        'email' => 'required',
        'telefone' => 'required',
        'rg' => 'required|numeric',
        'categoria' => 'required|min:3|max:45',
        'instituicao' => 'required|min:3|max:45',
        'observacoes' => 'required|min:3|max:45',
        'fk_solicitacao' => 'required',*/
        $dados = 
        "data-id='$passageiros->id' 
        data-nome_passageiro='$passageiros->nome_passageiro' 
        data-matricula='$passageiros->matricula' 
        data-status='$passageiros->status'
        data-telefone='$passageiros->telefone'
        data-rg='$passageiros->rg'
        data-categoria='$passageiros->categoria'
        data-instituicao='$passageiros->instituicao'
        data-observacoes='$passageiros->observacoes'
        data-email='$passageiros->email'
        data-fk_solicitacao='$passageiros->fk_solicitacao'
        ";
        $nomeviagem = $passageiros->viagem->nome;
        //dd($nomeviagem);
        $dadosVisualizar = 
        "data-nome_passageiro='$passageiros->nome_passageiro' 
        data-matricula='$passageiros->matricula' 
        data-status='$passageiros->status'
        data-telefone='$passageiros->telefone'
        data-rg='$passageiros->rg'
        data-categoria='$passageiros->categoria'
        data-instituicao='$passageiros->instituicao'
        data-observacoes='$passageiros->observacoes'
        data-email='$passageiros->email'
        data-fk_solicitacao='$nomeviagem'
        ";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Passageiro' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Passageiro' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Passageiro' data-id='$passageiros->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
      //dd($request->all());
        $rules = array(
              'nome_passageiro' => 'required|min:3|max:45',
              'matricula' => 'required|numeric',
              'email' => 'required',
              'telefone' => 'required',
              'rg' => 'required|numeric',
              'categoria' => 'required|min:3|max:45',
              'instituicao' => 'required|min:3|max:45',
              'observacoes' => 'required|min:3|max:45',
              'fk_solicitacao' => 'required',

        );
        $attributeNames = array(
            'nome_passageiro' => 'Nome',
            'matricula' => 'Matricula',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'rg' => 'RG',
            'categoria' => 'Categoria',
            'instituicao' => 'Instituição',
            'observacoes' => 'Observações',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        /* ver depois
        $file = $request->photo; // retorna o objeto em questão

        var_dump($file);
        */
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Passageiro = new Passageiro();
            $Passageiro->nome_passageiro = $request->nome_passageiro;
            $Passageiro->matricula = $request->matricula;
            $Passageiro->email = $request->email;
            $Passageiro->telefone = $request->telefone;
            $Passageiro->rg = $request->rg;
            $Passageiro->categoria = $request->categoria;
            $Passageiro->instituicao = $request->instituicao;
            $Passageiro->observacoes = $request->observacoes;
            $Passageiro->fk_solicitacao = $request->fk_solicitacao;
            $Passageiro->status = "Ativo";
            $Passageiro->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Passageiro);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome_passageiro' => 'required',
            'matricula' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'rg' => 'required',
            'categoria' => 'required',
            'instituicao' => 'required',
            'observacoes' => 'required',
            'fk_solicitacao' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Passageiro = Passageiro::find($request->id);
            $Passageiro->nome_passageiro = $request->nome_passageiro;
            $Passageiro->matricula = $request->matricula;
            $Passageiro->email = $request->email;
            $Passageiro->telefone = $request->telefone;
            $Passageiro->rg = $request->rg;
            $Passageiro->categoria = $request->categoria;
            $Passageiro->instituicao = $request->instituicao;
            $Passageiro->observacoes = $request->observacoes;
            $Passageiro->fk_solicitacao = $request->fk_solicitacao;
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
    /*
    public function move()
    {
        $file = \Input::file('photo'); // retorna o objeto em questão

        var_dump($file);
        var_dump(\Input::hasFile('photo'));

        $destinationPath = public_path().DIRECTORY_SEPARATOR.'files';
        $fileName = '01.'.pathinfo('Hearthstone.desktop')['extension'];

        //var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
        var_dump($file->move($destinationPath, $fileName));
    }
    */
}
