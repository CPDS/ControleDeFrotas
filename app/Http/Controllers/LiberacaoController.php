<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiberacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculo::select('nome_veiculo','id')->where('status','Ativo')->get();
        $motoristas = User::role('Motorista')->where('status','Ativo')->select('name','id')->get();
        return view('liberacao.index',compact('veiculos','motoristas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Liberacao = new Liberacao();
        $Liberacao->titulo = $request->titulo;
        $data_hora_saida = $request->data_saida.' '.$request->hora_saida.':00';
        $data_hora_chegada = $request->data_chegada.' '.$request->hora_chegada.':00';
        $Liberacao->datahora_saida = $data_hora_saida;
        $Liberacao->datahora_chegada = $data_hora_chegada;
        $Liberacao->destino = $request->destino;
        $Liberacao->retorno = $request->retorno;
        $Liberacao->fk_veiculo = $request->fk_veiculo;
        $Liberacao->fk_motorista = $request->fk_motorista;
        $Liberacao->status = 'Ativo';
        $Liberacao->save();
        return response()->json($Liberacao); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'titulo' => 'required',
            'destino' => 'required',
            'retorno' => 'required',
            'fk_veiculo' => 'required',
            'fk_motorista' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else {

            $Liberacao = Liberacao::find($request->id);
            $Liberacao->titulo = $request->titulo;
            $data_hora_saida = $request->data_saida.' '.$request->hora_saida.':00';
            $data_hora_chegada = $request->data_chegada.' '.$request->hora_chegada.':00';
            $Liberacao->datahora_saida = $data_hora_saida;
            $Liberacao->datahora_chegada = $data_hora_chegada;
            $Liberacao->destino = $request->destino;
            $Liberacao->retorno = $request->retorno;
            $Liberacao->fk_veiculo = $request->fk_veiculo;
            $Liberacao->fk_motorista = $request->fk_motorista;
            $Liberacao->save();
            //$equipamento->setAttribute('buttons', $this->setDataButtons($equipamento));
            return response()->json($Liberacao); // editar para viagem
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) { // deletar
        $Liberacao = Liberacao::find($request->id);
        $Liberacao->status = "Inativo";
        $Liberacao->save();
        return response()->json($Liberacao);
    }
}
