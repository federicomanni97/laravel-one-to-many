@extends('layouts.app')
@section('content')
<section class="container">
    <h1>Edit Category {{$category->name}}</h1>
    <form action="{{route('admin.categories.update' , $category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Title</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required maxlength="200" minlength="3" value="{{old('name', $category->name)}}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Select a Category</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>

            @endforeach
        </select> 
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</section>