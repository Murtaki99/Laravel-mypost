@extends('layouts.main')
@section('main')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <article class="mb-4 my">
                <h2>{{ $post->title }}</h2>
                <small><a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> | <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small>
                @if ($post->image)
                <img style="max-height:350px; overflow:hidden;" class="img-fluid" src="{{ asset('storage/' .$post->image)  }}" alt="{{ $post->image }}">
                @else
                <img class="img-fluid" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
                <div align="justify" class="my-3 fs-5">{!! $post->body !!}</div>
            </article>
            <a href="/posts" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
