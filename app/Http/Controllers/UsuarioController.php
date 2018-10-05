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
use App\Usuario;

class UsuarioController extends Controller
{
    public function index(){
        return view('usuario.index');
    }

    public function list() {
        $Usuario = Usuario::orderBy('created_at', 'desc')->get();

        return Datatables::of($Usuario)->editColumn('acao', function ($usuarios){

        	return $this->setBtns($usuarios);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Usuario $usuarios){
    	$dados = "data-id='$usuarios->id' data-nome_usuario='$usuarios->nome_usuario' data-email='$usuarios->email' data-papel='$usuarios->papel' data-status='$usuarios->status'";
        $dadosVisualizar = "data-nome_usuario='$usuarios->nome_usuario' data-email='$usuarios->email' data-papel='$usuarios->papel' data-status='$usuarios->status'";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Usuario' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Usuario' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Usuario' data-id='$usuarios->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'nome_usuario' => 'required',
              'email' => 'required',
              'papel' => 'required',
              'status' => 'required'

        );
        $attributeNames = array(
            'nome_usuario' => 'Nome',
            'email' => 'Email',
            'papel' => 'Função',
            'status' => 'Status'

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
            $Usuario = new Usuario();
            $Usuario->nome_usuario = $request->nome_usuario;
            $Usuario->email = $request->email;
            $Usuario->papel = $request->papel;
            $Usuario->password = bcrypt($request->password);
            $Usuario->status = "Ativo";
            $Usuario->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Usuario);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nome_usuario' => 'required',
            'email' => 'required',
            'papel' => 'required',
            'status' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Usuario = Usuario::find($request->id);
            $Usuario->nome_usuario = $request->nome_usuario;
            $Usuario->email = $request->email;
            $Usuario->papel = $request->papel;
            $Usuario->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Usuario);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Usuario = Usuario::find($request->id);
        $Usuario->status = "Inativo";
        $Usuario->save();
        return response()->json($Usuario);
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
