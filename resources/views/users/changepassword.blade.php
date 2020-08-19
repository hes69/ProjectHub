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

            {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['updatepassword', $user->id]
            ]) !!}

            <div class="form-group">
            {!! Form::password('password',['placeholder' =>'Passwort','class' => 'rtextbox'] ) !!}
        </div>

        {!! Form::submit('Änderungen Speichern') !!}

    {!! Form::close() !!}
    </main>
@endsection



