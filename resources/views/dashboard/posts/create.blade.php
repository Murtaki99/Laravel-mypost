@extends('dashboard.layouts.main')

@section('content')
<h1>{{ $title }}</h1>

<div class="row mb-5">
    <div class="col-lg-6">
        <form role="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title Post</label>
                <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}" autofocus required>
                @error('title')
                <div class="invalid-feedback" style="">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Slug Post</label>
                <input class="form-control @error('slug') is-invalid @enderror" name=" slug" id="slug" placeholder="Slug" value="{{ old('slug') }}" readonly required>
                @error('slug')
                <div class="invalid-feedback" style="">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach ( $categories as $category )
                    @if(old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
                <trix-editor input="body"></trix-editor>
                @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input style="padding: 10px" type="file" name="image" id="image" class="@error('image') is-invalid @enderror" onchange="previewImage()">
                <img class="img-preview img-fluid mt-3 col-sm-4">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <hr>
            <div class="col text-right">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    
    
    title.addEventListener('change', function(){
    fetch('/dash/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
    });
</script>
@endsection
