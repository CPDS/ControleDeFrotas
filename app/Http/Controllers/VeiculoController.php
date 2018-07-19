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
        return Datatables::of($Veiculo)->make(true);
    }
}
