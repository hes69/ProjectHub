@extends('layouts.master')
@section('content')
    <main>
        <h2>
            Bearbeitung "{{ $user->name }}"</h2>
        <hr>
        {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.update', $user->id]
        ]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail:', ['class' => 'control-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>



        {!! Form::submit('Änderungen Speichern', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </main>
@endsection