@extends('layouts.master')
@section('content')
    <main>

<div class="row">
    <div class="col-md-10">

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    <h1 class="shl">{{ $project->title }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-4">

        @isset($project->photo)
            <div class="placeholder">
            <img class="ib" src='{{ asset('public/images/catalog/'.$project->photo) }}' alt="hello">
</div>
    @endisset
        @empty($project->photo)
                <div class="placeholder">
                <img class="ib" src='{{ asset('public/images/catalog/default.jpg') }}' class="img-fluid" alt="hello"  width="128" height="128">
                </div>
        @endempty

    </div>
    <div class="col-md-8">
        <p >{{ $project->description }}</p>
        <div id="contact"  class="contact" onclick="showDiv()" >
            <a href="#">Kontakt <span class="small">aufnehmen</span></a>
        </div>

        <div id="sendmail"  style="display:none;"  >

            <h2>E-Mail Senden</h2>
        {!! Form::open([
                'route' => ['sendmail', $project->id],
                  'files' => true
               ]) !!}

            <div class="row">
                {!! Form::text('name', '',array('placeholder'=>'Name','class'=>'textbox' ) ) !!}


                {!! Form::text('email', '',array('placeholder'=>'E-mail','class'=>'textbox' ) ) !!}
            </div>
            <div class="row">
                {!! Form::textarea('description', '',array('placeholder'=>'Nachrichten','class'=>'textbox' ) ) !!}

            </div>

            {!! Form::submit('Senden') !!}
        </div>

    </div>
</div>
<script>

        function showDiv() {
        document.getElementById('sendmail').style.display = "block";
            document.getElementById('contact').style.display = "none";
        }
</script>

    </main>
@endsection










