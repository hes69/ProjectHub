@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        {!! Form::open([
            'route' => 'assignedprojects.store',
              'files' => true
        ]) !!}

            <div class="form-group">
                {!! Form::label('user', 'User:', ['class' => 'control-label']) !!}
                {!! Form::select('user', $users,'s',['class' => 'form-control'] ) !!}
            </div>

        <div class="form-group">
            {!! Form::label('role', 'Role:', ['class' => 'control-label']) !!}
            {!! Form::select('role', $userRole,'s',['class' => 'form-control'] ) !!}
        </div>

        {!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}




@endsection



