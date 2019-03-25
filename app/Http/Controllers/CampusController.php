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
use App\Campus;

class CampusController extends Controller
{
    public function index(){
        return view('campus.index');
    }

    public function list() {
        $Campus = Campus::orderBy('created_at', 'desc')->where('status','Ativo')->get();

        return Datatables::of($Campus)
        ->editColumn('acao', function ($campus){

        	return $this->setBtns($campus);
        })
        ->escapeColumns([0])
        ->make(true);
    }

    private function setBtns(Campus $campus){
    	$dados = "data-id='$campus->id' data-nome_campus='$campus->nome_campus' data-status='$campus->status'";
        $dadosVisualizar = "data-nome_campus='$campus->nome_campus' data-status='$campus->status'";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Campus' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Campus' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Campus' data-id='$campus->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
            'nome_campus' => 'required|min:3|max:45',
        );
        $attributeNames = array(
            'nome_campus' => 'Nome',
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
            $Campus = new Campus();
            $Campus->nome_campus = $request->nome_campus;
            $Campus->status = "Ativo";
            $Campus->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Campus);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome_campus' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Campus = Campus::find($request->id);
            $Campus->nome_campus = $request->nome_campus;
            $Campus->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Campus);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Campus = Campus::find($request->id);
        $Campus->status = "Inativo";
        $Campus->save();
        return response()->json($Campus);
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
