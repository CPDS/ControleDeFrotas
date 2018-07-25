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
use App\Veiculo;


class VeiculoController extends Controller
{
    public function index(){
        return view('veiculo.index');
    }

    public function list() {
        $Veiculo = Veiculo::orderBy('created_at', 'desc')->get();

        return Datatables::of($Veiculo)->editColumn('acao', function ($veiculos){
        	return $this->setBtns($veiculos);
        })->escapeColumns([0])->make(true);
    }

    private function setBtns(Veiculo $veiculos){
    	$dados = "data-id='$veiculos->id' data-nome='$veiculos->nome' data-placa='$veiculos->placa' data-tipo_combustivel='$veiculos->tipo_combustivel' ";
      $dadosVisualizar = "data-nome='$veiculos->nome' data-placa='$veiculos->placa 'data-tipo_combustivel='$veiculos->tipo_combustivel' ";
    	$btnVer= "<a class='btn btn-primary btn-sm btnVer' title='Ver Veículo' $dados ><i class='fa fa-eye'></i></a> ";
    	$btnEditar= "<a class='btn btn-warning btn-sm btnEditar' title='Editar Veículo' $dados><i class ='fa fa-pencil'></i></a> ";
    	$btnDeletar= "<a class='btn btn-danger btn-sm btnDeletar' title='Deletar Veículo' data-id='$veiculos->id'><i class='fa fa-trash'></i></a>";

    	return $btnVer.$btnEditar.$btnDeletar;
    }
}
