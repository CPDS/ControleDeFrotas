@extends('layouts.app')

@section('content')
    <div class="container">

      <div class="panel panel-primary">

        <div class="panel-heading">Calendário de Viagem </div>

        <div class="painel-body">

          {!! Form::open(array('route' => 'events.add', 'method' => 'POST', 'files' => 'true')) !!}
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  @if (Session::has('success'))
                    <div class="alert alert-sucesso">{{ Session::get('success') }}</div>
                  @elseif (Session::has('warning'))
                    <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                  @endif

                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    { !! Form::label('event_name', 'Event Name:') !!}
                    <div class="">
                      { !! Form:text('event_name', null, ['class' => 'form_control']) !!}
                      { !! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                  </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    { !! Form:label('start_date', 'Start Date:') !!}
                    { !! Form:date('start_date', null, ['class' => 'form_control']) !!}
                    { !! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
                </div>
              </div>

              <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                  { !! Form:label('end_date', 'End Date:') !!}
                  { !! Form:date('end_date', null, ['class' => 'form_control']) !!}
                  { !! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
              {!! Form::submit('Add Event', ['class' => 'btn btn-primary']) !!}
            </div>
          </div>

          { !! Form::close() !!}

            }

        </div>

      </div>

    </div>
@endsection
