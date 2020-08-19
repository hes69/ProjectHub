@extends('layouts.master')
        @section('content')
            <main>
                {!! Form::open([
                        'route' => 'projects.store',
                          'files' => true
                    ]) !!}

                <div class="row">
                {!! Form::text('name', '',array('placeholder'=>'Name','class'=>'textbox' ) ) !!}


                    {!! Form::text('email', '',array('placeholder'=>'E-mail','class'=>'textbox' ) ) !!}
                </div>
                <div class="row">
                </div>

                {!! Form::textarea('description', '',array('placeholder'=>'Description','class'=>'textbox' ) ) !!}
                {!! Form::submit('send mail', ['class' => 'btn btn-primary']) !!}

            </main>
        @endsection
