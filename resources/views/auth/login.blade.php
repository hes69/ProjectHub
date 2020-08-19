@extends('layouts.master')
@section('content')
    <main>

<div class="container">

        {!! Form::open([
                     'route' => 'login',
                       'files' => true
                 ]) !!}

        <div class="col-md-8 col-md-offset-2">

            <h2 class="shl">Einloggen</h2>
            <p>Anschauen,änderen und freuen </p>

        <div class="row">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-md-3">
                {!! Form::text('email', '',array('placeholder'=>'Email','class'=>'textbox' ) ) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col-md-3">


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                {{ Form::password('password', array('placeholder'=>'Passwort','class'=>'textbox' ) ) }}

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            </div>

                {!! Form::submit('Einloggen') !!}

        </div>
        </div>
        {!! Form::close() !!}
    </main>

@endsection







