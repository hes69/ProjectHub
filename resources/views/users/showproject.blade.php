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
                @foreach($asproject as $project)
                    <div class="row">
                        <div class="col-md-4">
                            <img src='{{ asset('public/images/catalog/'.$project->project->photo) }}' class="img-fluid" alt=""  width="128" height="128">
                        </div>
                        <div class="col-md-4">
                            <h2>{{ $project->project->title }}</h2>
                            <p>{{ $project->project->description }}</p>
                            <p>Posted by: {{ $project->projectstatus->user->name }}</p>
                            <p>Email: {{ $project->projectstatus->user->email }}</p>

                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
@endsection