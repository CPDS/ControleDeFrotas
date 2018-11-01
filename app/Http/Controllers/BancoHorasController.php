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
use App\{
  User,
  BancoHoras
};


class BancoHorasController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        $users = User::role('Motorista')->where('status','Ativo')->get();
        return view('banco_hora.index', compact('users'));
    }

    public function list() {
        $Horas = BancoHoras::orderBy('created_at', 'desc')->get();

        return Datatables::of($Horas)
        ->editColumn('acao', function ($horass){
            return $this->setBtns($horass);
        })
        ->editColumn('fk_motorista', function ($horass){
              return $horass->motorista->name;
        })
        ->escapeColumns([0])
        ->make(true);
    }

    private function setBtns(BancoHoras $horass){
        //dd($horass);
        $motorista_nome = $horass->motorista->name;
        
        $dados = "data-id='$horass->id' data-hora_inicio='$horass->hora_inicio' data-hora_termino='$horass->hora_termino' data-hora_intervalo='$horass->hora_intervalo'";
        $dadosVisualizar = "data-hora_inicio='$horass->hora_inicio' data-hora_termino='$horass->hora_termino' data-hora_intervalo='$horass->hora_intervalo'
        data-fk_motorista='$motorista_nome ' ";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Horas' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Horas' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Horas' data-id='$horass->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'hora_inicio' => 'required',
              'hora_termino' => 'required',
              'fk_motorista' => 'required',
              'hora_intervalo' => 'required',
        );
        $attributeNames = array(
            'hora_inicio' => 'Início',
            'hora_termino' => 'Término',
            'fk_motorista' => 'Motorista',
            'hora_intervalo' => 'Intervalo',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
            $Horas = new BancoHoras();
            $Horas->hora_inicio = $request->hora_inicio;
            $Horas->hora_termino = $request->hora_termino;
            $Horas->fk_motorista = $request->fk_motorista;
            $Horas->hora_intervalo = $request->hora_intervalo;
            $Horas->status = "Ativo";
            $Horas->save();
            //$Horas->setAttribute('titulo', $Horas->titulo);
            //$Horas->setAttribute('descricao', $Horas->descricao);
            return response()->json($Horas);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'hora_inicio' => 'required',
            'hora_termino' => 'required',
            'fk_motorista' => 'required',
            'hora_intervalo' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Horas = Horas::find($request->id);
            $Horas->hora_inicio = $request->hora_inicio;
            $Horas->hora_termino = $request->hora_termino;
            $Horas->fk_motorista = $request->fk_motorista;
            $Horas->hora_intervalo = $request->hora_intervalo;
            $Horas->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Horas);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Horas = Horas::find($request->id);
        $Horas->status = "Inativo";
        $Horas->save();
        return response()->json($Horas);
    }


}
