@isset($pjs)
@extends('layouts.master')
@section('content')
    <main>
        <h2 class="shl"> Herzlich​ ​willkommen​ ​in​ ​der​ ​Project Hub </h2>

        <h2 class="shl">Neue​ ​Projekte</h2>
        <div class="row">
            @foreach($pjs as $pj)<a class="project" href="{{ route('projects.show', $pj->project->id) }}">
                <div class="placeholder">

                @isset($pj->project->photo)
                    <img class="ib" src='{{ asset('public/images/catalog/'.$pj->project->photo) }}' alt="hello">
                @endisset
                @empty($pj->project->photo)
                    <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  width="128" height="128">
                @endempty
                </div>

                <h3>{{ $pj->project->title }}</h3>
                </a>@endforeach

        </div>
        @guest

        {!! Form::open([
             'route' => 'login',
               'files' => true
         ]) !!}


        <h2 class="shl">Einloggen</h2>
        <p>Anschauen,änderen und freuen </p>

        {!! Form::text('email', '',array('placeholder'=>'Email','class'=>'textbox' ) ) !!}
        {{ Form::password('password', array('placeholder'=>'Passwort','class'=>'textbox' ) ) }}


        {!! Form::submit('Einloggen') !!}

        {!! Form::close() !!}
@endguest

    </main>


</body>
@endsection
@endisset

