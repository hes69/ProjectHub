<!-- app/views/nerds/index.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="col-md-1 text-left">
    <nav id="sidebar-nav">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ route('projects.create') }}" >Create Project</a></li>
            <li><a href="pjstatus" >Poroject Status </a></li>
            <li><a href="{{ route('categories.index') }}" >Categories</a></li>
            <li><a href="{{ route('assignedprojects.index') }}" >Assigned Project</a></li>
        </ul>
    </nav>
    </div>
    <div class="container">
        <div class="panel-body">
    <h1>Project List</h1>
    <hr>
            <div>
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
    @endif
            </div>
@foreach($projects as $project)
<div class="row">
        <div class="col-md-3">
            <img src='{{ asset('public/images/catalog/'.$project->photo) }}' class="img-fluid" alt=""  width="128" height="128">
        </div>
    <div class="col-md-4">
    <h3>{{ $project->title }}</h3>
    <p>{{ $project->description}}</p>
        <p>
        <a href="{{ route('pjstatus.show', $project->id) }}" class="btn btn-info">View Project</a>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit Project</a>
       </p>
                    </div>
</div>
    <hr>

@endforeach
        </div>
        </div>
@endsection