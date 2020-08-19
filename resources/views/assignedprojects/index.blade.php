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
            <h1>Assigned Project List</h1>
            <hr>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}

            @endif

        <div class="pull-right">


            <a href="pjstatus " class="btn btn-info">Poroject status</a>


        </div>

    @foreach($asps as $asp)
            <div class="panel-body">
                <h3>Project Title:  {{ $asp->project->title }}</h3>
                <h3>Project description</h3>
                <p>{{ $asp->project->description }}</p>
                <p> Required fund: {{$asp->project->require_fund}}</p>
                <p> Start Date: {{$asp->project->start_date}}</p>
                <p> End Date: {{$asp->project->end_date}}</p>
                <p> Is assigned to : {{ $asp->user->name}}</p>
                <p> Is posted by : {{ $asp->projectstatus->user->name}}</p>

                <a href="{{action('AssignprojectController@deassign',$asp->id)}}"class="btn btn-info">Deactive Project</a>
                <hr>
                <p>
                </p>

            </div>
        @endforeach
                </div>
</div>
@endsection