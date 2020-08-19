<!-- app/views/nerds/index.blade.php -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<div class="col-md-1 text-left">
    <nav id="sidebar-nav">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{route('projects.create') }}" >Post Project</a></li>
            <li><a href="{{action('UserController@profile',$user_id)}}">Profile </a></li>
            <li><a href="{{action('UserController@showproject',$user_id)}}">Projects </a></li>
        </ul>
    </nav>
</div>

<div class="container">
    <div class="panel-body">
        <h1>Active Project List</h1>
        <hr>
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
        @endif

    </div>

    @foreach($pjs as $pj)
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <img src='{{ asset('public/images/catalog/'.$pj->project->photo) }}'  class="img-fluid"  alt=""  width="128" height="128">
            </div>
            <div class="col-md-4">
                <h2>{{ $pj->project->title }}</h2>
                <p>{{ $pj->project->description }}</p>
                <p> Required fund: {{$pj->project->require_fund}}</p>
                <p> Start Date: {{$pj->project->start_date}}</p>
                <p> End Date: {{$pj->project->end_date}}</p>
                <p> User: {{ $pj->user->name}}</p>
                <p>
                    <a href="{{action('ProjectstatusController@assignproject',$pj->id)}}"class="btn btn-info">Accept Project</a>

                </p>
            </div>

        </div>
        <hr>
        @endforeach
    </div>
</div>
</div>
<div class="text-center">
    {{ $pjs->links() }}
</div>
@endsection














<div class="row">
    <div class="col-md-10">

        <h1 class="shl">Kontaktinformation</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @isset($user->image)
        <img class="ib" src='{{ asset('public/images/avatar/'.$user->image) }}' class="img-fluid" alt="hello"  width="128" height="128">
        @endisset
        @empty($user->image)
        <img class="ib" src='{{ asset('public/images/avatar/default.png') }}' class="img-fluid" alt="hello"  width="128" height="128">
        @endempty
    </div>
    <div class="col-md-8">
        <h3>Name: {{ $user->name }}</h3>
        <p>E-Mail-Adresse: {{ $user->email }}</p>
        <p>Straße: {{ $user->street }}</p>
        <p>PLZ: {{ $user->postacode }}</p>
        <p>Ort: {{ $user->city }}</p>
        <p>Telefone:{{ $user->Tlephone}}</p>
    </div>
</div>