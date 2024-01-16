@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$project->title}}</h1>
        <p>{{$project->body}}</p>
        <img src="{{ asset('storage/' . $project->image) }}" alt="">
        <button class="text-white"><a href="{{route('admin.projects.edit' , $project)}}">Edit</a></button>
        <form action="{{route('admin.projects.destroy' , $project)}}" method="POST">
            @csrf
            @method ('DELETE')
        <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        
    </section>
@endsection