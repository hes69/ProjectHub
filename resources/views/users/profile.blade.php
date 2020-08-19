@extends('layouts.master')
@section('content')
    <main>
    <div class="row">
    <div class="col-md-4">
        @isset($user->image)
            <div class="placeholder">
            <img class="ib" src='{{ asset('public/images/avatar/'.$user->image) }}' class="img-fluid" alt="hello"  width="128" height="128">
            </div>
        @endisset
        @empty($user->image)
                <div class="placeholder">
                    <img class="ib" src='{{ asset('public/images/avatar/default.png') }}' class="img-fluid" alt="hello"  width="128" height="128">
                </div>
        @endempty
    </div>

        <div class="col-md-4">
        <h3>Name: {{ $user->name }}</h3>
        <p>E-Mail: {{ $user->email}}</p>
        <p>Straße: {{ $user->street}}</p>
        <p>Ort: {{ $user->city}}</p>
        <p>PLZ : {{ $user->postalcode}}</p>
        <p>Telefon: {{ $user->telephone}}</p>
        </div>
        <div class="link">
        <a href="{{ route('users.edit', $user->id) }}">Profil bearbeiten</a>
        </div>
        <div class="link">
        <a href="{{ route('changepassword', $user->id) }}">Passwortändern</a>
        </div>
    </div>
        <hr>
        @if (count($asprojects) > 1)
        <h2>Ausgewiesene Projekte</h2>
        <hr>
                @foreach($asprojects as $project)
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="shl">{{ $project->project->title }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @isset($project->project->photo)
                            <div class="placeholder">
                            <img class="ib" src='{{ asset('public/images/catalog/'.$project->project->photo) }}' alt="hello">
                            </div>
                        @endisset
                        @empty($project->project->photo)
                                <div class="placeholder">
                                <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  width="128" height="128">
                                </div>
                        @endempty
                    </div>
                    <div class="col-md-8">
                        <p >{{ $project->project->description }}</p>
                        <p>Email: {{ $project->projectstatus->user->email }}</p>

                    </div>
                </div>
            @endforeach
        @endif
        <hr>
        @if (count($psprojects) > 1)
            <h2>Posted Project List</h2>
            <hr>

                    @foreach($psprojects as $project)
            <div class="row">
                <div class="col-md-10">
                        <h2 class="shl">{{ $project->project->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">


                    @isset($project->project->photo)
                        <div class="placeholder">
                        <img class="ib" src='{{ asset('public/images/catalog/'.$project->project->photo) }}' alt="hello">
                        </div>
                    @endisset


                    @empty($project->project->photo)
                            <div class="placeholder">
                                <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  width="128" height="128">
                            </div>
                    @endempty
                </div>
                <div class="col-md-8">
                    <p >{{ $project->project->description }}</p>

                </div>
            </div>
            @endforeach
@endif
    </main>
@endsection



