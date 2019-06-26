<?php
// Controlador referente a Viagem
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
    Viagem,
    Estado,
    Cidade,
    Veiculo,
    TipoServico,
    User,
    ViagemVeiculo
};

class ViagemController extends Controller
{
    public function index(){
        $viagems = Viagem::select('numero_rv', 'id')->get();
        $estados = Estado::select('nome','id')->get();
        $tipo_servicos = TipoServico::select('nome_servico','id')->get();
        $veiculos = Veiculo::select('nome_veiculo','id')->where('status','Ativo')->get();
        $motoristas = User::role('Motorista')->where('status','Ativo')->select('name','id')->get();
        $cidades = Cidade::select('nome','id')->get();
        $solicitantes = User::select('name','id')->where('status','Ativo')->get();
        //dd($motoristas);
        return view('viagem.index',compact('estados','tipo_servicos','veiculos','motoristas', 'viagems','cidades','solicitantes'));
    }

    public function list() {

        //Capturar Usuário Logado
        $usuario_logado = Auth::user();

        //Consulta para Colaboradores
        if($usuario_logado->hasRole('Motorista')){

            $Viagem = Viagem::orderBy('created_at', 'desc')->where('status','Ativo')
            ->where('fk_motorista',$usuario_logado->id)
            ->get();

        }
        else{
            $Viagem = Viagem::orderBy('created_at', 'desc')->where('status','Ativo')->get();
        }

        return Datatables::of($Viagem)->editColumn('acao', function ($viagems){
            return $this->setBtns($viagems);
        })
        ->editColumn('fk_veiculo', function ($viagems){
            return $viagems->veiculo->nome_veiculo;
        })
        ->editColumn('fk_cidade_saida', function ($viagems){
            return $viagems->cidade_saida->nome;
        })
        ->editColumn('fk_cidade_chegada', function ($viagems){
            return $viagems->cidade_chegada->nome;
        })
        ->editColumn('datahora_saida', function($viagems){
            return date("d/m/y",strtotime($viagems->datahora_saida));
        })
        ->editColumn('datahora_chegada', function($viagems){
            return date("d/m/y",strtotime($viagems->datahora_chegada));
        })
        ->escapeColumns([0])
        ->make(true);
    }

    private function setBtns(Viagem $viagems){
      $data_saida = substr($viagems->data_saida, 0, 10);
      $data_hora = substr($viagems->data_saida, 11, 8);
      $data_chegada = substr($viagems->data_chegada, 0, 10);
      $data_criado_em = substr($viagems->criado_em, 0, 10);
      $data_atualizado_em = substr($viagems->atualizado_em, 0, 10); // quebrar a string de hora e data

      $nomeveiculo = $viagems->veiculo->nome_veiculo;
      $nomemotorista = $viagems->motorista->name;
      $cidadesaida = $viagems->cidade_saida->nome;
      $cidadechegada = $viagems->cidade_chegada->nome;
      $tiposervico = $viagems->tipo_servico->nome_servico;
      $solicitante = $viagems->solicitante->name;
      $estado = $viagems->cidade_saida->estado->id;
      $estado2 = $viagems->cidade_chegada->estado->id;
      $nomeestado = $viagems->cidade_saida->estado->nome;
      $nomeestado2 = $viagems->cidade_chegada->estado->nome;

      $data_saida1 = date('Y-m-d',strtotime($viagems->datahora_saida));
      $data_chegada1 = date('Y-m-d',strtotime($viagems->datahora_chegada));

      $hora_saida1 = date('H:i',strtotime($viagems->datahora_saida));
      $hora_chegada1 = date('H:i',strtotime($viagems->datahora_chegada));


      $formatadata = date("d/m/y",strtotime($viagems->datahora_saida));
      $visualizarsaida = $formatadata.' '.$hora_saida1.':00';

      $formatadata = date("d/m/y",strtotime($viagems->datahora_saida));
      $visualizarchegada = $formatadata.' '.$hora_chegada1.':00';

      //$nomecidade = $viagems->cidade_chegada->nome;
      //dd($cidadechegada);

      $dados = "data-id='$viagems->id' data-numero_rv='$viagems->numero_rv' data-fk_motorista='$viagems->fk_motorista' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$viagems->fk_veiculo'
      data-datahora_saida='$viagems->datahora_saida' data-datahora_chegada='$viagems->datahora_chegada' data-status='$viagems->status' data-fk_cidade_saida='$viagems->fk_cidade_saida'
      data-fk_cidade_chegada='$viagems->fk_cidade_chegada' data-estado='$estado' data-estado2='$estado2' data-fk_tipo_servico='$viagems->fk_tipo_servico' data-fk_id_solicitante='$viagems->fk_id_solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel'  data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' data-situacao='$viagems->situacao' ";

      $dadosEditar = "data-id='$viagems->id' data-nome='$viagems->nome' data-numero_rv='$viagems->numero_rv' data-fk_motorista='$viagems->fk_motorista' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$viagems->fk_veiculo'
      data-data_saida2='$data_saida1' data-hora_saida2='$hora_saida1' data-data_chegada2='$data_chegada1' data-hora_chegada2='$hora_chegada1' data-status='$viagems->status' data-fk_cidade_saida='$viagems->fk_cidade_saida'
      data-fk_cidade_chegada='$viagems->fk_cidade_chegada' data-estado='$estado' data-estado2='$estado2' data-fk_tipo_servico='$viagems->fk_tipo_servico' data-fk_id_solicitante_visualizar='$solicitante' data-fk_id_solicitante='$viagems->fk_id_solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel' data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' data-situacao='$viagems->situacao' ";

      $dadosVisualizar = "data-numero_rv='$viagems->numero_rv' data-nome='$viagems->nome' data-fk_motorista='$nomemotorista' data-setor_emissor_rv='$viagems->setor_emissor_rv' data-fk_veiculo='$nomeveiculo'
      data-datahora_saida='$visualizarsaida' data-datahora_chegada='$visualizarchegada' data-status='$viagems->status' data-fk_cidade_saida='$cidadesaida'
      data-fk_cidade_chegada='$cidadechegada' data-estado='$nomeestado' data-estado2='$nomeestado2' data-fk_tipo_servico='$tiposervico' data-fk_id_solicitante='$solicitante' data-estimativa_km='$viagems->estimativa_km'
      data-nome_responsavel='$viagems->nome_responsavel' data-telefone_responsavel='$viagems->telefone_responsavel' data-local_saida='$viagems->local_saida'  data-setor_autoriza_viagem='$viagems->setor_autoriza_viagem'  data-numero_passageiros='$viagems->numero_passageiros'  data-tipo_solicitacao='$viagems->tipo_solicitacao'  data-natureza_servico='$viagems->natureza_servico'  data-custo_viagem='$viagems->custo_viagem'  data-descricao_bagagem='$viagems->descricao_bagagem'  data-codigo_acp_rv='$viagems->codigo_acp_rv' ";
      
      $btnDeletar='';
      $btnEditar='';
      $btnVer='';
      $btnVaga='';

    	$btnVer= " <a class='btn btn-primary btn-sm btnVer' title='Ver Viagem' $dadosVisualizar ><i class='fa fa-eye'></i></a> ";
        if(Auth::user()->hasRole('Administrador|Secretaria|Coordenador'))
            $btnEditar= " <a class='btn btn-warning btn-sm btnEditar' title='Editar Viagem' $dadosEditar><i class ='fa fa-pencil'></i></a> ";
        if(Auth::user()->hasRole('Administrador|Tecnico|Professor'))
            $btnVaga = " <a class='btn btn-primary btn-sm btnVaga' title='Solicitar Vaga'><i class ='fa fa-plus'></i></a>";
        if(Auth::user()->hasRole('Administrador|Secretaria|Coordenador'))
    	    $btnDeletar= " <a class='btn btn-danger btn-sm btnDeletar' title='Deletar Viagem' data-id='$viagems->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnVaga.$btnDeletar;
    }

    public function store(Request $request) { // cadastro de viagem

        $rules = array(
            'numero_rv' => 'required|numeric',
            'setor_emissor_rv' => 'required',
            'fk_veiculo' => 'required',
            //'datahora_saida' => 'required|date_format:d-m-Y',
            //'datahora_chegada' => 'required|date_format:d-m-Y',
            //'status' => 'required',
            'fk_cidade_saida' => 'required',
            //'status' => 'required',
            'fk_cidade_chegada' => 'required',
            'fk_tipo_servico' => 'required',
            //'fk_id_solicitante' => 'required',
            'estimativa_km' => 'required|numeric',
            'nome_responsavel' => 'required|min:3|max:45',
            'telefone_responsavel' => 'required',
            'local_saida' => 'required|min:3|max:45',
            'setor_autoriza_viagem' => 'required',
            'numero_passageiros' => 'required|numeric',
            'tipo_solicitacao' => 'required|min:3|max:45',
            'natureza_servico' => 'required|min:3|max:45',
            'custo_viagem' => 'required|numeric',
            'descricao_bagagem' => 'required|min:3|max:45',
            'codigo_acp_rv' => 'required|numeric',
        );

        $attributeNames = array(
            'numero_rv' => 'Numero RV',
            'setor_emissor_rv' => 'Setor Emissor',
            'fk_veiculo' => 'required',
            //'datahora_saida' => 'required|date_format:d-m-Y',
            //'datahora_chegada' => 'required|date_format:d-m-Y',
            //'status' => 'required',
            'fk_cidade_saida' => 'Cidade Saida',
            //'status' => 'required',
            'fk_cidade_chegada' => 'Cidade Chegada',
            'fk_tipo_servico' => 'Tipo Serviço',
            //'fk_id_solicitante' => 'Solicitante',
            'estimativa_km' => 'Estimativa Km',
            'nome_responsavel' => 'Nome do Responsável',
            'telefone_responsavel' => 'Telefone do Responsável',
            'local_saida' => 'Local Saida',
            'setor_autoriza_viagem' => 'Setor Autoriza',
            'numero_passageiros' => 'Numero de Passageiros',
            'tipo_solicitacao' => 'Tipo de Solicitação',
            'natureza_servico' => 'Natureza do Serviço',
            'custo_viagem' => 'Custo da Viagem',
             'descricao_bagagem' => 'Descrição Bagagem',
            'codigo_acp_rv' => 'Código ACP',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {
            //conversoes data e hora
            //$data_entrega =>'date_format:d/m/Y H:i:s|before:data_saida'
            //$data_saida =>'date_format:d/m/Y H:i:s|after:data_entrega'

            $data_saida = $request->data_saida.' '.$request->datahora_saida.':00';
            $data_entrega = $request->data_final.' '.$request->hora_final.':00';


            $data_hora_saida = $request->data_saida.' '.$request->hora_saida.':00';
            $data_hora_chegada = $request->data_chegada.' '.$request->hora_chegada.':00';
            $Viagem = new Viagem();
            $Viagem->numero_rv = $request->numero_rv;
            $Viagem->setor_emissor_rv = $request->setor_emissor_rv;
            $Viagem->nome = $request->nome;
            $Viagem->fk_veiculo = $request->fk_veiculo;
            $Viagem->fk_motorista = $request->fk_motorista;
            $Viagem->datahora_saida = $data_hora_saida;
            $Viagem->datahora_chegada = $data_hora_chegada;
            $Viagem->fk_cidade_saida = $request->fk_cidade_saida;
            $Viagem->fk_cidade_chegada = $request->fk_cidade_chegada;
            $Viagem->fk_tipo_servico = $request->fk_tipo_servico;
            $Viagem->fk_id_solicitante = Auth::user()->id;
            $Viagem->estimativa_km = $request->estimativa_km;
            $Viagem->nome_responsavel = $request->nome_responsavel;
            $Viagem->telefone_responsavel = $request->telefone_responsavel;
            $Viagem->local_saida = $request->local_saida;
            $Viagem->situacao = 'Pendente';
            $Viagem->setor_autoriza_viagem = $request->setor_autoriza_viagem;
            $Viagem->numero_passageiros = $request->numero_passageiros;
            $Viagem->tipo_solicitacao = $request->tipo_solicitacao;
            $Viagem->natureza_servico = $request->natureza_servico;
            $Viagem->custo_viagem = $request->custo_viagem;
            $Viagem->descricao_bagagem = $request->descricao_bagagem;
            $Viagem->codigo_acp_rv = $request->codigo_acp_rv;
            $Viagem->status = 'Ativo';
            $Viagem->save();

            $ViagemVeiculo = new ViagemVeiculo();
            $ViagemVeiculo->fk_solicitacao = $Viagem->id;
            $ViagemVeiculo->fk_veiculo = $request->fk_veiculo;
            $ViagemVeiculo->fk_motorista = $request->fk_motorista;
            $ViagemVeiculo->status = 'Ativo';
            $ViagemVeiculo->save();

            return response()->json($Viagem); // mudar para viagem
        }
    }

    public function update(Request $request) // atualização de info
    {
        $rules = array(
            'numero_rv' => 'required|numeric',
            'setor_emissor_rv' => 'required',
            'fk_veiculo' => 'required',
            'datahora_saida' => 'required|date_format:d/m/Y',
            'datahora_chegada' => 'required|date_format:d/m/Y',
            //'status' => 'required',
            'fk_cidade_saida' => 'required',
            //'status' => 'required',
            'fk_cidade_chegada' => 'required',
            'fk_tipo_servico' => 'required',
            //'fk_id_solicitante' => 'required',
            'estimativa_km' => 'required|numeric',
            'nome_responsavel' => 'required|min:3|max:45',
            'telefone_responsavel' => 'required',
            'local_saida' => 'required|min:3|max:45',
            'setor_autoriza_viagem' => 'required',
            'numero_passageiros' => 'required|numeric',
            'tipo_solicitacao' => 'required|min:3|max:45',
            'natureza_servico' => 'required|min:3|max:45',
            'custo_viagem' => 'required|numeric',
            'descricao_bagagem' => 'required',
            'codigo_acp_rv' => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Viagem = Viagem::find($request->id);
            $Viagem->numero_rv = $request->numero_rv; // banco = html ~tag~ | mudar conforma tá o banco de viagem
            $Viagem->setor_emissor_rv = $request->setor_emissor_rv;
            $Viagem->nome = $request->nome;
            $Viagem->fk_veiculo = $request->fk_veiculo;
            $Viagem->datahora_saida = $request->datahora_saida;
            $Viagem->datahora_chegada = $request->datahora_chegada;
            $Viagem->fk_cidade_saida = $request->fk_cidade_saida;
            //$Viagem->status = 'Ativo';
            $Viagem->fk_cidade_chegada = $request->fk_cidade_chegada;
            $Viagem->fk_tipo_servico = $request->fk_tipo_servico;
            $Viagem->fk_id_solicitante = Auth::user()->id;
            $Viagem->estimativa_km = $request->estimativa_km;
            $Viagem->nome_responsavel = $request->nome_responsavel;
            $Viagem->telefone_responsavel = $request->telefone_responsavel;
            $Viagem->local_saida = $request->local_saida;
            $Viagem->setor_autoriza_viagem = $request->setor_autoriza_viagem;
            $Viagem->numero_passageiros = $request->numero_passageiros;
            $Viagem->tipo_solicitacao = $request->tipo_solicitacao;
            $Viagem->natureza_servico = $request->natureza_servico;
            $Viagem->custo_viagem = $request->custo_viagem;
            $Viagem->descricao_bagagem = $request->descricao_bagagem;
            $Viagem->codigo_acp_rv = $request->codigo_acp_rv;
            $Viagem->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Viagem); // editar para viagem
        }
    }


    public function reservas(Request $request){
      $dados = explode(',',$request->dados);
      $datasaida = $dados[0];
      $datachegada = $dados[1];

      $veiculos_reservados = '';
      $veiculos_reservados = $this->verificadisponibilidade($datasaida, $datachegada);
      //dd($veiculos_reservados);
      //$teste = ViagemController::verificadisponibilidade($datasaida, $datachegada);
      //dd($teste);

      //array de veiculos reservados
      $naoPodeUsar = array();
      $veiculoReservar = array();
      $motoristaReservar = array();
      $naoPodeMotorista = array();

        if($veiculos_reservados != null){
            foreach($veiculos_reservados as $veiculo_reservado){
                if($veiculo_reservado->status == 'Ativo'){
                    array_push($naoPodeUsar,$veiculo_reservado->id);
                    array_push($naoPodeMotorista,$veiculo_reservado->fk_motorista);
                }
            }
        }
        //dd($veiculos_reservados);
        $motorista_que_sera_reservado = '';
        $veiculo_que_sera_reservado = '';
                //Reservas de veículos

        if($veiculos_reservados == null){
            $veiculo_que_sera_reservado = Veiculo::where('status','Ativo')->get();
        }else{
            $veiculo_que_sera_reservado = Veiculo::where('status','Ativo')
            ->whereNotIn('id',$naoPodeUsar)
            ->get();
        }
        //Resevas de motoristas
        if($veiculos_reservados == null){
            $motorista_que_sera_reservado = User::role('Motorista')
            ->where('status','Ativo')
            ->get();
        }else{
            $motorista_que_sera_reservado = User::role('Motorista')
            ->where('status','Ativo')
            ->whereNotIn('id',$naoPodeMotorista)
            ->get();
        }
        //dd()
        //array de veiculos
        foreach ($veiculo_que_sera_reservado as $veiculo_que_sera_reservado2) {

            array_push($veiculoReservar,[
                'id' => $veiculo_que_sera_reservado2->id,
                'nome_veiculo' => $veiculo_que_sera_reservado2->nome_veiculo
            ]);
        }

        //array de motoristas
        foreach($motorista_que_sera_reservado as $motorista_que_sera_reservado2){
            array_push($motoristaReservar,[
                'id' => $motorista_que_sera_reservado2->id,
                'nome' => $motorista_que_sera_reservado2->name
            ]);
        }
        //dd($veiculoReservar);
        return response()->json(['veiculos'=> $veiculoReservar, 'motoristas' => $motoristaReservar]);
    }

    public static function verificadisponibilidade($data_retirada, $data_entrega){
        //convertendo para formato americano
        $data_retirada = date('Y-m-d H:i:s',strtotime($data_retirada));
        $data_entrega = date('Y-m-d H:i:s',strtotime($data_entrega));

        //Todos os equipamentos ocupados no dia escolhido + hora inicial + hora final das reservas
        /*
        $consulta = 'select equipamento_reservas.id_equipamento,
        reservas.data_retirada,reservas.data_entrega,
        equipamento_reservas.status from equipamentos join equipamento_reservas
        on equipamento_reservas.id_equipamento = equipamentos.id
        join reservas on equipamento_reservas.id_reserva = reservas.id
        where ? between data_retirada and data_entrega or ? between data_retirada and data_entrega
        or data_retirada >= ? and data_entrega <= ? and reservas.status = ?
        and equipamento_reservas.status = ? or reservas.status = ?';
        */
        $consulta = 'select users.name, veiculos.nome_veiculo,veiculos.id,
        viagems.datahora_saida,viagems.datahora_chegada,
        viagem_veiculos.fk_motorista, viagem_veiculos.status from viagems join viagem_veiculos
        on viagem_veiculos.fk_solicitacao = viagems.id
        join veiculos on viagem_veiculos.fk_veiculo = veiculos.id join users on
        viagems.fk_motorista = users.id
        where ? between viagems.datahora_saida and viagems.datahora_chegada or ? between viagems.datahora_saida and viagems.datahora_chegada
        and viagems.status = ? and viagem_veiculos.status = ? and veiculos.status = ?';

        //Associando atributos e executando a consulta sql
        $Reservados = DB::select($consulta,[
            $data_retirada,
            $data_entrega,
            'Ativo',
            'Ativo',
            'Ativo'
        ]);
        //dd($data_retirada);
        return $Reservados;
    }


    // desabilitar veículo

    public function destroy(Request $request) { // deletar
        $Viagem = Viagem::find($request->id);
        $Viagem->status = "Inativo";
        $Viagem->save();
        return response()->json($Viagem);
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
