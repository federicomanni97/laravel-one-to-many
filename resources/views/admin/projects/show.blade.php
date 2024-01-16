@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$project->title}}</h1>
        <p>{{$project->body}}</p>
        <span>{{$project->category ? $project->category->name : 'Uncategorized'}}</span>
    </section>
@endsection