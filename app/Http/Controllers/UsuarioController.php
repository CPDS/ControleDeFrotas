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
use Hash;
use App\User;
use App\Estado;
use App\Cidade;


class UsuarioController extends Controller
{
    public function index(){
        //Selecionando os Estados
        $estados = Estado::select('nome','id')->get();
        return view('usuario.index',compact('estados'));
    }

    public function list() {
        $usuarios = User::orderBy('created_at', 'desc')->get();

        return Datatables::of($usuarios)
        ->editColumn('acao', function ($usuarios){
        	return $this->setBtns($usuarios);
        })
        ->editColumn('status',function($usuarios){
          if($usuarios->status)
            return " <span class='label label-success' style='font-size:14px'>Ativo</span>";
          else
            return " <span class='label label-default' style='font-size:14px'>Inativo</span>";
        })
        ->editColumn('funcao', function($usuarios){
            foreach($usuarios->getRoleNames() as $tipoFuncao){
                $funcao = $tipoFuncao;
            }
            return $funcao;
        })
        ->escapeColumns([0])
        ->make(true);
    }

    private function setBtns(User $usuarios){

      //Variável de status
        if($usuarios->status)
            $status = 'Ativo';
        else
            $status = 'Inativo';
        //Buscando a funçao do usuario
        foreach($usuarios->getRoleNames() as $tipoFuncao)
            $funcao = $tipoFuncao;


      $dados = 'data-name="'.$usuarios->name.'" data-email="'.$usuarios->email.'" data-telefone="'.$usuarios->telefone.'" data-funcao="'.$funcao.'"
      data-endereco="'.$usuarios->endereco.'" data-cidade="'.$usuarios->cidade->id .'" data-estado="'.$usuarios->cidade->estado->id.'"
      data-status="'.$status.'"';
      $dados_visualizar = 'data-name="'.$usuarios->name.'" data-email="'.$usuarios->email.'" data-telefone="'.$usuarios->telefone.'" data-funcao="'.$funcao.'"
      data-endereco="'.$usuarios->endereco.'" data-cidade="'.$usuarios->cidade->name .'" data-estado="'.$usuarios->cidade->estado->name.'"
      data-status="'.$status.'"';

    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Usuario' $dados_visualizar ><i class='fa fa-eye'></i></a> ";
      $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Usuario' $dados><i class ='fa fa-pencil'></i></a> ";

      if(Auth::user()->id == $usuarios->id)
          $btnDeletar= "";
      else
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Usuario' data-id='$usuarios->id'><i class='fa fa-trash'></i></a>";

      if(!$usuarios->status){
          $btnAtivar = ' <a data-id="'.$usuarios->id.'" class="btn btn-warning btnAtivar" '. $dados .' title="Ativar Usúário" data-toggle="tooltip" ><i class="fa fa-user-plus"> </i></a>';
          return $btnVer.$btnEditar.$btnAtivar;
      }else{
          return $btnVer.$btnEditar.$btnDeletar;
      }
    }

    public function store(Request $request) {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'senha' => 'required|same:confirmarsenha',
            'endereco' => 'required',
            'telefone' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'funcao' => 'required',
        );
        $attributeNames = array(
            'confirmarsenha' => 'confirmar senha',
            'funcao' => 'função',

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
            //dd($request->all());
            $Usuario = new User();
            $Usuario->name = $request->name;
            $Usuario->email = $request->email;
            $Usuario->password = Hash::make($request->senha);
            $Usuario->telefone = $request->telefone;
            $Usuario->fk_cidade = $request->cidade;
            $Usuario->endereco = $request->endereco;
            $Usuario->status = true;
            $Usuario->save();
            $Usuario->assignRole($request->funcao);
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            $Usuario->setAttribute('buttons', $this->setBtns($Usuario));
            return response()->json($Usuario);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Usuario = Usuario::find($request->id);
            $Usuario->name = $request->name;
            $Usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->endereco = $request->endereco;
            $usuario->fk_cidade = $request->cidade;
            $usuario->assignRole($request->funcao);
            $usuario->save();
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

    //Select Cidade
    public function selectCidade(Request $request){
        //consulta no banco
        $dados_cidades = Cidade::where('fk_estado',$request->estado)
        ->select('id','nome')
        ->orderBy('nome')
        ->get();
        //Array de cidade
        $cidades = array();
        foreach($dados_cidades as $dados_cidade){
            array_push($cidades,[
                'id' => $dados_cidade->id,
                'nome' => $dados_cidade->nome
            ]);
        }
        //retornando para o javascript
        return response()->json(['cidades' => $cidades]);

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
