
@extends('layouts.master')
@section('content')
    <main>

        {!! Form::open([
            'route' => 'register',
              'files' => true
        ]) !!}

        <div class="row">

            <div class="col-md-4">
                <h2 class="shl">Registrieren</h2>
            <p>Diese​ ​Daten​ ​sind​ ​für​ ​niemanden​ ​öffentlich​ ​einsehbar​ ​und​ ​dienen​ ​zur​ ​Kontaktaufnahme​ ​zwischen​ ​Spender​ ​und Empfänger.​ ​Alle​ ​mit​ ​*​ ​versehenen​ ​Felder​ ​müssen​ ​ausgefüllt​ ​werden. </p>
            </div>
            </div>

        <div class="row">
            <div class="col-md-4">

            <div class="form-group ">
<div class="placeholder">
    {!! Form::label('Profilbild​') !!}
        {!! Form::file('image',array('placeholder'=>'Image','class'=>'rtextbox' ) ) !!}
    <p>Wir​ ​akzeptieren​ ​Dateien​ ​in​ ​den​ ​Formaten​ ​.jpg​ ​und​ ​.jpeg,​ ​die​ ​nicht​ ​größer​ ​als​ ​20​ ​MB​ ​sind.</p>
</div>
    </div>
</div>
    <div class="col-md-6">


            <div class="form-group   {{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::text('name', '',array('placeholder'=>'*Name','class'=>'rtextbox' ) ) !!}

            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::text('email', '',array('placeholder'=>'*E-mail','class'=>'rtextbox' ) ) !!}

                                @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('pasword') ? ' has-error' : '' }}">

                                {!! Form::password('password',array('placeholder'=>'*Passwort','class'=>'rtextbox' ) ) !!}

                            @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                               <div class="form-group{{ $errors->has('paswordCONFIRMATION') ? ' has-error' : '' }}">
                                   {!! Form::password('password_confirmation',array('placeholder'=>'*Passwort​ ​bestätigen','class'=>'rtextbox' ) ) !!}
                               @if ($errors->has('password_confirmation'))
                                           <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                       @endif
                               </div>
                            <div class="form-group">
                               {!! Form::submit('Registrieren') !!}
                            </div>
    {!! Form::close() !!}
                </div>
</div>
    </main>
@endsection



