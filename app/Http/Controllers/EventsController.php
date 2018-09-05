<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Calendar;

class EventsController extends Controller
{
    public function index(){
        return view('Events.index');
    }

    public function addEvent(Request $request)
    {
      $validator = Validator::make($request->all(),[
          'event_name' => 'required',
          'start_date' => 'required',
          'end_date' => 'required'
      ]);

      if($validator->fails()){
        \Session::flash('warning', 'Por favor, informe dados válidos!');
        return Redirect::to('/events')->withInput()->withErrors($validator);
      }

      $event = new Event;
      $event->event_name = $request['event_name'];
      $event->start_date = $request['start_date'];
      $event->end_date = $request['end_date'];
      $event->save();

      \Session::flash('success', 'Evento adicionado com sucesso!');
      return Redirect::to('/events');


    }


}
