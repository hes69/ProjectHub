<!-- app/views/nerds/index.blade.php -->
@extends('layouts.master')
    @section('content')
        <div class="col-md-1 text-left">
            <nav id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('projects.create') }}" >Create Project</a></li>
                    <li><a href="pjstatus" >Poroject Status </a></li>
                </ul>
            </nav>
        </div>
        <div class="container">
    <div class="panel-body">
        <h1>Inactive Project List</h1>

        <hr>
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
        @endif
    </div>
    @foreach($pjs as $pj)
    <div class="panel-body">
        <h3>Project Title:  {{ $pj->project->title }}</h3>
        <h3>Project description</h3>
        <p>{{ $pj->project->description }}</p>
        <p> Required fund: {{$pj->project->require_fund}}</p>
        <p> Start Date: {{$pj->project->start_date}}</p>
        <p> End Date: {{$pj->project->end_date}}</p>
        <p> User: {{ $pj->user->name}}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection

