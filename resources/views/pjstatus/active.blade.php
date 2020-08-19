@extends('layouts.master')
@section('content')
    <main>
        <h2 class="sh1">Unsere​ ​Förderprojekte </h2>
        <p>Anschauen,​ ​ändern​ ​und​ ​freuen </p>
        <div class="row">

            @foreach($pjs as $pj)<a class="project" href="{{ route('projects.show', $pj->project->id) }}">
                    @isset($pj->project->photo)
                        <div class="placeholder">
                        <img class="ib" src='{{ asset('public/images/catalog/'.$pj->project->photo) }}' alt="hello">
                        </div>
                            @endisset
                        @empty($pj->project->photo)
                            <div class="placeholder">

                            <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  width="128" height="128">
                            </div>
                        @endempty
                <h3>{{ $pj->project->title }}</h3>
            </a>@endforeach

        </div>
    </main>


</body>
@endsection