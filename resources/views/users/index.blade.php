<!-- app/views/nerds/index.blade.php -->
@extends('layouts.app')
@section('content')
    <div id ="header">Project Hub</div>

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
            <h1>User List</h1>
            <hr>
            <div>

                    @foreach($users as $user)
                        <div class="row">
                            <div class="col-md-4">
                                <img src='{{ asset('public/images/catalog/'.$user->image) }}' class="img-fluid" alt=""  width="128" height="128">
                            </div>
                            <div class="col-md-4">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user->email}}</p>

                            </div>
                            <div class="col-md-4">
                                <a href="{{action('UserController@profile',$user->id)}}" class="btn btn-primary">Profile </a>
                                <a href="{{action('UserController@editrole')}}" class="btn btn-primary">Edit Role</a>
                            </div>
                        </div>
                        <hr>

                    @endforeach
            </div>
        </div>
@endsection