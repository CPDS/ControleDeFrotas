<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Viagem;
use App\User;

use DB;
class RelatorioController extends Controller
{
    
    public function viagens(){
        $viagens = Viagem::orderBy('created_at', 'desc')->where('status','Ativo')->get();
        //dd($viagens);
        $footer = \View::make('relatorios.footer')->render();
        $header = \View::make('relatorios.header')->render();
        $pdf = PDF::loadView('viagem.relatorio', ['viagens' => $viagens]);
        $pdf->setPaper('a4')->setOption('header-html',$header)->setOption('footer-html',$footer);
        return $pdf->stream();  
    }
    
}