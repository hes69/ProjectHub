@extends('layouts.master')
@section('content')
    <main>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
        <h2>NEUES​ ​PROJEKT​ ​ERSTELLEN </h2>
        <p>Alle​ ​mit​ ​*​ ​versehenen​ ​Felder​ ​müssen​ ​ausgefüllt​ ​werden. </p>

    {!! Form::open([
        'route' => 'projects.store',
          'files' => true
    ]) !!}
        <div class="row">

            <div class="col-md-4">
            <div class="placeholder">
                {!! Form::label('Projektbild​') !!}
                {!! Form::file('photo', null) !!}
                <p>Wir​ ​akzeptieren​ ​Dateien​ ​in​ ​den​ ​Formaten​ ​.jpg​ ​und​ ​.jpeg,​ ​die​ ​nicht​ ​größer​ ​als​ ​20​ ​MB​ ​sind</p>

            </div>

        </div>
            <div class="col-md-6">

            <div class="form-group">
        {!! Form::text('title', null,array('placeholder'=>'*Projekttitel ','class'=>'rtextbox'))!!}
    </div>


       <div class="form-group">
            {!! Form::text('require_fund', null, array('placeholder'=>'*Spendenziel','class'=>'rtextbox')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Start-Datum​') !!}
            {!! Form::date('start_date', null,array('placeholder'=>'Start-Datum','class'=>'rtextbox')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('End-Datum') !!}
            {!! Form::date('end_date', null, array('placeholder'=>'End-Datum','class'=>'rtextbox')) !!}
        </div>


    <div class="form-group">
        {!! Form::textarea('description', null, array('placeholder'=>'*Beschreibung','class'=>'rtextbox')) !!}
    </div>
                {!! Form::submit('Erstellen ') !!}

            </div>

        </div>

    </main>
@endsection



