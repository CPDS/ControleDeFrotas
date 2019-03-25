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
use App\Diario;
use App\Percurso;
use App\Estado;
use App\Cidade;

class PercursoController extends Controller
{
    public function index(){
        $estados = Estado::select('nome','id')->get();
        $diarios = Diario::where('status','Ativo')->get();
        $percursos = Percurso::where('status','Ativo')->get();
        $cidades = Cidade::select('nome','id')->get();
        //die($percursos);
        return view('percurso.index',compact('diarios','estados','cidades'));
    }

    public function list() {
        $percurso = Percurso::orderBy('created_at', 'desc')->get();
        return Datatables::of($percurso)
        ->editColumn('acao', function ($percursos){
            return $this->setBtns($percursos);
        })
        ->escapeColumns([0])
        ->make(true);
    }

    private function setBtns(Percurso $percursos){
        //dd($percursos);
        $cidadesaida = $percursos->cidade_saida->nome;
        $cidadechegada = $percursos->cidade_chegada->nome;
        $estado = $percursos->cidade_saida->estado->id;
        $estado2 = $percursos->cidade_chegada->estado->id;
        $idcidadesaida = $percursos->cidade_saida->id;
        $idcidadechegada = $percursos->cidade_chegada->id;
        $nomeestado = $percursos->cidade_saida->estado->nome;
        $nomeestado2 = $percursos->cidade_chegada->estado->nome;

        $data_saida = date('Y-m-d',strtotime($percursos->hora_saida));
        $data_chegada = date('Y-m-d',strtotime($percursos->hora_chegada));

        $hora_saida = date('H:i',strtotime($percursos->hora_saida));
        $hora_chegada = date('H:i',strtotime($percursos->hora_chegada));

        $formatadata = date("d/m/y",strtotime($percursos->hora_saida));
        $visualizarsaida = $formatadata.' '.$hora_saida.':00';

        $formatadata = date("d/m/y",strtotime($percursos->hora_chegada));
        $visualizarchegada = $formatadata.' '.$hora_chegada.':00';
    
        

        $dados = "data-id='$percursos->id' data-data_saida='$data_saida' data-data_chegada='$data_chegada' data-estado='$estado' data-estado2='$estado2' data-fk_cidade_chegada='$idcidadechegada' data-fk_cidade_saida='$idcidadesaida' data-hora_saida='$hora_saida' data-local_saida='$percursos->local_saida' data-km_saida='$percursos->km_saida' data-roteiro='$percursos->roteiro' data-hora_chegada='$hora_chegada' data-local_chegada='$percursos->local_chegada' data-km_chegada='$percursos->km_chegada' data-fk_diario='$percursos->fk_diario' ";
        $dadosVisualizar = "data-estado='$nomeestado' data-estado2='$nomeestado2' data-fk_cidade_chegada='$cidadechegada' data-fk_cidade_saida='$cidadesaida' data-hora_saida='$visualizarsaida' data-local_saida='$cidadesaida' data-tipo_combustivel='$percursos->tipo_combustivel' data-km_saida='$percursos->km_saida' data-roteiro='$percursos->roteiro' data-hora_chegada='$visualizarchegada' data-local_chegada='$cidadechegada' data-km_chegada='$percursos->km_chegada' data-fk_diario='$percursos->fk_diario' ";
        $btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Percurso' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
        $btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Percurso' $dados><i class ='fa fa-pencil'></i></a> ";
        $btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Percurso' data-id='$percursos->id'><i class='fa fa-trash'></i></a>";

        return $btnVer.$btnEditar.$btnDeletar;
    }

    public function store(Request $request) {
        $rules = array(
              'hora_saida' => 'required|date_format:d-m-Y',
              //'local_saida' => 'required',
              'km_saida' => 'required|numeric',
              'roteiro' => 'required|min:3|max:45',
              'hora_chegada' => 'required|numeric',
              //'local_chegada' => 'required',
              'km_chegada' => 'required|numeric',
              'fk_diario' => 'required',

        );
        $attributeNames = array(
            'hora_saida' => 'Hr Saída',
            //'local_saida' => 'Local Saída',
            'km_saida' => 'Km Saída',
            'roteiro' => 'Roteiro',
            'hora_chegada' => 'Hr Chegada',
            //'local_chegada' => 'Local Chegada',
            'km_chegada' => 'Km Chegada',
            'fk_diario' => 'Diário',


        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {

            $data_hora_saida = $request->data_saida.' '.$request->hora_saida.':00';
            $data_hora_chegada = $request->data_chegada.' '.$request->hora_chegada.':00';
            $Percurso = new Percurso();
            //$Percurso->hora_saida = $request->hora_saida;
            $Percurso->hora_saida = $data_hora_saida;
            $Percurso->hora_chegada =$data_hora_chegada;
            $Percurso->local_saida = $request->fk_cidade_saida;
            $Percurso->km_saida = $request->km_saida;
            $Percurso->roteiro = $request->roteiro;
            //$Percurso->hora_chegada = $request->hora_chegada;
            $Percurso->local_chegada = $request->fk_cidade_chegada;
            $Percurso->km_chegada = $request->km_chegada;
            $Percurso->fk_diario = $request->fk_diario;

            $Percurso->status = "Ativo";
            $Percurso->save();
            //$Percurso->setAttribute('titulo', $Percurso->titulo);
            //$Percurso->setAttribute('descricao', $Percurso->descricao);
            return response()->json($Percurso);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'hora_saida' => 'required',
            //'local_saida' => 'required',
            //'tipo_combustivel' => 'required',
            'km_saida' => 'required',
            'roteiro' => 'required',
            'hora_chegada' => 'required',
            //'local_chegada' => 'required',
            'km_chegada' => 'required',
            'fk_diario' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $data_hora_saida = $request->data_saida.' '.$request->hora_saida.':00';
            $data_hora_chegada = $request->data_chegada.' '.$request->hora_chegada.':00';

            $Percurso = Percurso::find($request->id);
            $Percurso->hora_saida = $data_hora_saida;
            $Percurso->local_saida = $request->fk_cidade_saida;
            //$Percurso->tipo_combustivel = $request->tipo_combustivel;
            $Percurso->km_saida = $request->km_saida;
            $Percurso->roteiro = $request->roteiro;
            $Percurso->hora_chegada = $data_hora_chegada;
            $Percurso->local_chegada = $request->fk_cidade_chegada;
            $Percurso->km_chegada = $request->km_chegada;
            $Percurso->fk_diario = $request->fk_diario;

            $Percurso->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Percurso);
        }
    }

    // desabilitar veículo

    public function destroy(Request $request) {
        $Percurso = Percurso::find($request->id);
        $Percurso->status = "Inativo";
        $Percurso->save();
        return response()->json($Percurso);
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
}
