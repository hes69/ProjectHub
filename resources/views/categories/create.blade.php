@extends('layouts.app')
@section('content')
    <div class="container">
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

        {!! Form::open([
            'route' => 'categories.store',
              'files' => true
        ]) !!}

        <div class="form-group">
            {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
            {!! Form::text('type', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Create New Category', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

        @endsection
    </div>
