<!-- app/views/nerds/index.blade.php -->
@extends('layouts.app')

    @section('content')

        <div class="col-md-1 text-left">
            <nav id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('categories.create') }}" >Create Category</a></li>
                    <li><a href="pjstatus" >Poroject Status </a></li>
                    <li><a href="{{ route('assignedprojects.index') }}" >Assigned Project</a></li>


                </ul>
            </nav>
        </div>
<div class="container">
        <div class="panel-body">
            <h1>Category List</h1>
            <hr>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

        @foreach($categories as $category)
            <div class="panel-body">
                <h3>category name:  {{ $category->type }}</h3>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit Category</a>
            </div>
            <div class="col-md-6 ">
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['categories.destroy', $category->id]
                ]) !!}
                {!! Form::submit('Delete this category?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
                <hr>
        @endforeach
        </div>
</div>
</div>
@endsection