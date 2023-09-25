@extends('dashboard.layouts.main')

@section('content')
<h1>{{ $title }}</h1>

<div class="row mb-5">
    <div class="col-lg-6">
        <form role="form" action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Title Post</label>
                <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title', $post->title) }}" autofocus required>
                @error('title')
                <div class="invalid-feedback" style="">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Slug Post</label>
                <input class="form-control @error('slug') is-invalid @enderror"" name=" slug" id="slug" placeholder="Slug" value="{{ old('slug', $post->slug) }}" readonly required>
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
                    @if(old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" required>
                <trix-editor input="body"></trix-editor>
                @error('body')
                <div class="invalid-feedback" style="">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Change Image</label>
                <input style="padding: 10px" type="file" name="image" id="image" class="@error('image') is-invalid @enderror" onchange="previewImage()">
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                <img class="img-preview img-fluid mt-3 col-sm-4" src="{{ asset('storage/' .$post->image) }}">
                @else
                <img class="img-preview img-fluid mt-3 col-sm-4">
                @endif
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <hr>
            <div class="col text-right">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
