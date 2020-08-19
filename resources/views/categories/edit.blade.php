@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Editing "{{ $category->type }}"</h1>
        <p class="lead">Edit and save this category below, or <a href="{{ route('categories.index') }}">go back to all categories.</a></p>
        <hr>



        {!! Form::model($category, [
            'method' => 'PATCH',
            'route' => ['categories.update', $category->id]
        ]) !!}

        <div class="form-group">
            {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
            {!! Form::text('type', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Update Project', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>
@endsection