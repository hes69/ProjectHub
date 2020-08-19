<!-- app/views/nerds/index.blade.php -->

@extends('layouts.admin')
@section('content')


        <div class="col-md-1 text-left">
            <nav class="adminnav">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('projects.create') }}" >Create Project</a></li>
                    <li><a href="pjstatus" >Poroject Status </a></li>
                   <li> <a href="activeproject " >Active Project</a></li>
                   <li> <a href=" assignedprojects " >Assigend Project </a></li>
                </ul>
            </nav>
        </div>
        <div class="admincontainer">
            <h2>Project List</h2>
            <hr>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif


            @foreach($pjs as $pj)
                    <div class="col-md-10">
                        <h1 class="shl">{{ $pj->project->title }}</h1></div>

                    <div class="row">
                    <div class="col-md-3">
                        @isset($pj->project->photo)
                            <div class="placeholder">
                            <img class="ib" src='{{ asset('public/images/catalog/'.$pj->project->photo) }}' alt="hello">
                            </div>
                                @endisset
                        @empty($pj->project->photo)
                                <div class="placeholder">
                                <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  >
                                </div>
                        @endempty
                    </div>
                    <div class="col-md-8">
                        <p >{{ $pj->project->description }}</p>
                        <p> Required fund: {{$pj->project->require_fund}}</p>
                        <p> Start Date: {{$pj->project->start_date}}</p>
                        <p> End Date: {{$pj->project->end_date}}</p>
                        <p> Project Status: {{$pj->status}}</p>
                        <p>
                            <a href="{{action('ProjectstatusController@activate',$pj->id)}}"class="btn btn-info">Activate Project</a>
                            <a href="{{action('ProjectstatusController@deactivate',$pj->id)}}"class="btn btn-info">Deactive Project</a>
                        </p>
                        <hr>

                    </div>
                </div>
@endforeach
        </div>
        <div class="text-center">
            {{ $pjs->links() }}
        </div>

@endsection