@extends('layouts.app')
@section('content')
<section class="container">
    <h2 class="text-primary mt-3">Post Creator</h2>
    <form action="{{route('admin.projects.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="my-2">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                required maxlength="200" minlength="3" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="my-2">Body</label>
            <textarea type="text" class="form-control @error('title') is-invalid @enderror" name="body" id="body"
                required maxlength="200" minlength="3" value="{{old('body')}}"></textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <img class="w-25" id="uploadPreview" src="https://via.placeholder.com/300x200" alt="PlaceHolder">
        </div>
        <div class="my-3">
            <label class="my-1" for="image">Image</label>
            <input type="file" class="form-control @error('title') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</section>
@endsection