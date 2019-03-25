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
use App\Veiculo;
use App\Campus;

class VeiculoController extends Controller
{
    public function index(){
        //$testecampus = Campus::where('status','Ativo')->get();
        //return view('veiculo.index', compact('testecampus'));
        $campuss = Campus::where('status','Ativo')->get();
        //dd($campuss);
        return view('veiculo.index',compact('campuss'));
    }
    public function list() {
        $Veiculo = Veiculo::orderBy('created_at', 'desc')->where('status','Ativo')->get();
        
        return Datatables::of($Veiculo)->editColumn('acao', function ($veiculos){
        	return $this->setBtns($veiculos);
        })
        ->editColumn('fk_campus', function ($veiculos){
            return $veiculos->campus->nome_campus;
        })
        ->editColumn('tem_arcondicionado', function ($veiculos){
            if($veiculos->tem_arcondicionado == true)
                return 'Sim';
            else
                return 'Não';
        })
        ->escapeColumns([0])->make(true);
    }
    private function setBtns(Veiculo $veiculos){
        $campus_nome = $veiculos->campus->nome_campus;
        if($veiculos->tem_arcondicionado == true)
            $temar = 'Sim';
        else
            $temar = 'Não';
    	$dados = "data-id='$veiculos->id' data-nome_veiculo='$veiculos->nome_veiculo' data-placa='$veiculos->placa' data-tipo_combustivel='$veiculos->tipo_combustivel' data-fk_campus='$campus_nome' data-qtd_total_lugares='$veiculos->qtd_total_lugares' data-ano_fabricacao='$veiculos->ano_fabricacao' data-minimo_passageiros='$veiculos->minimo_passageiros' data-maximo_passageiros='$veiculos->maximo_passageiros' data-rendimento='$veiculos->rendimento' data-marca='$veiculos->marca' data-tem_arcondicionado='$temar' data-tipo_bagageiro='$veiculos->tipo_bagageiro'";
        $dadosVisualizar = "data-nome_veiculo='$veiculos->nome_veiculo' data-placa='$veiculos->placa 'data-tipo_combustivel='$veiculos->tipo_combustivel' data-fk_campus='$campus_nome' data-qtd_total_lugares='$veiculos->qtd_total_lugares' data-ano_fabricacao='$veiculos->ano_fabricacao' data-minimo_passageiros='$veiculos->minimo_passageiros' data-maximo_passageiros='$veiculos->maximo_passageiros' data-rendimento='$veiculos->rendimento' data-marca='$veiculos->marca' data-tem_arcondicionado='$temar' data-tipo_bagageiro='$veiculos->tipo_bagageiro'";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Veículo' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Veículo' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Veículo' data-id='$veiculos->id'><i class='fa fa-trash'></i></a>";
    	return $btnVer.$btnEditar.$btnDeletar;
    }
    public function store(Request $request) {
        $rules = array(
              'nome_veiculo' => 'required|min:3|max:45',
              'placa' => 'required|min:3|max:45',
              'tipo_combustivel' => 'required',
              'fk_campus' => 'required',
              'qtd_total_lugares' => 'required|numeric',
              'ano_fabricacao' => 'required|numeric',
              'minimo_passageiros' => 'required|numeric',
              'maximo_passageiros' => 'required|numeric',
              'rendimento' => 'required|numeric',
              'marca' => 'required|min:3|max:45',
              'tem_arcondicionado' => 'required',
              'tipo_bagageiro' => 'required|min:3|max:45',
        );
        $attributeNames = array(
            'nome_veiculo' => 'Nome',
            'placa' => 'Placa',
            'tipo_combustivel' => 'Tipo de Combustível',
            'fk_campus' => 'Campus',
            'qtd_total_lugares' => 'Qtd lugares',
            'ano_fabricacao' => 'Ano fabr.',
            'minimo_passageiros' => 'Min Passageiros',
            'maximo_passageiros' => 'Max Passageiros',
            'rendimento' => 'Rendimento',
            'marca' => 'Marca',
            'tem_arcondicionado' => 'Tem AR?',
            'tipo_bagageiro' => 'Bagageiro',
        );
        $messages = array(
            'same' => 'Essas senhas não coincidem.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else {
          if($request->tem_arcondicionado == "Sim")
              $ar = true;
          else
              $ar = false;

            $Veiculo = new Veiculo();
            $Veiculo->nome_veiculo = $request->nome_veiculo;
            $Veiculo->placa = $request->placa;
            $Veiculo->tipo_combustivel = $request->tipo_combustivel;
            $Veiculo->fk_campus = $request->fk_campus;
            $Veiculo->qtd_total_lugares = $request->qtd_total_lugares;
            $Veiculo->ano_fabricacao = $request->ano_fabricacao;
            $Veiculo->minimo_passageiros = $request->minimo_passageiros;
            $Veiculo->maximo_passageiros = $request->maximo_passageiros;
            $Veiculo->rendimento = $request->rendimento;
            $Veiculo->marca = $request->marca;
            $Veiculo->tem_arcondicionado = $ar;
            $Veiculo->tipo_bagageiro = $request->tipo_bagageiro;
            $Veiculo->status = "Ativo";
            $Veiculo->save();
            //$Veiculo->setAttribute('titulo', $Veiculo->titulo);
            //$Veiculo->setAttribute('descricao', $Veiculo->descricao);
            return response()->json($Veiculo);
        }
    }
    public function update(Request $request)
    {
        $rules = array(
            'nome_veiculo' => 'required',
            'placa' => 'required',
            'tipo_combustivel' => 'required',
            'fk_campus' => 'required',
            'qtd_total_lugares' => 'required',
            'ano_fabricacao' => 'required',
            'minimo_passageiros' => 'required',
            'maximo_passageiros' => 'required',
            'rendimento' => 'required',
            'marca' => 'required',
            'tem_arcondicionado' => 'required',
            'tipo_bagageiro' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {
            if($request->tem_arcondicionado == "Sim")
              $ar = true;
          else
              $ar = false;
            $Veiculo = Veiculo::find($request->id);
            $Veiculo->nome_veiculo = $request->nome_veiculo;
            $Veiculo->placa = $request->placa;
            $Veiculo->tipo_combustivel = $request->tipo_combustivel;
            $Veiculo->fk_campus = $request->fk_campus;
            $Veiculo->qtd_total_lugares = $request->qtd_total_lugares;
            $Veiculo->ano_fabricacao = $request->ano_fabricacao;
            $Veiculo->minimo_passageiros = $request->minimo_passageiros;
            $Veiculo->maximo_passageiros = $request->maximo_passageiros;
            $Veiculo->rendimento = $request->rendimento;
            $Veiculo->marca = $request->marca;
            $Veiculo->tem_arcondicionado = $ar;
            $Veiculo->tipo_bagageiro = $request->tipo_bagageiro;
            $Veiculo->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Veiculo);
        }
    }
    // desabilitar veículo
    public function destroy(Request $request) {
        $Veiculo = Veiculo::find($request->id);
        $Veiculo->status = "Inativo";
        $Veiculo->save();
        return response()->json($Veiculo);
    }

    //Select Campus
    /*
    public function selectCampus(Request $request){
        //consulta no banco
        $dados_campuses = Campus::where('status','Ativo')->get();
        //Array de campus
        $campus = array();
        foreach($dados_campuses as $dados_campus){
            array_push($campus,[
                'id' => $dados_campus->id,
                'nome' => $dados_campus->nome
            ]);
        }
        //retornando para o javascript
        return response()->json(['cidades' => $campus]);
        
    }
    */
}
