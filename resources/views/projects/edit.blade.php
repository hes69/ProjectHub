@extends('layouts.app')
@section('content')

    <div class="container">
    <h1>Editing "{{ $project->title }}"</h1>
    <p class="lead">Edit and save this project below, or <a href="{{ route('projects.index') }}">go back to all projects.</a></p>
    <hr>
    {!! Form::model($project, [
        'method' => 'PATCH',
        'route' => ['projects.update', $project->id]
    ]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update Project', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

    </div>
    @endsection