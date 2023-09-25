@extends('layouts.main')
@section('main')
<h3 class="text-successmb-3 p-2">{{ $title }}</h3>
<div class="mb-3"> @include('searc') </div>
@if ($posts->count())
<div class="card mb-3">
    @if ($posts[0]->image)
    <img style="max-height:350px; overflow:hidden;" class="card-img-top" src="{{ asset('storage/' .$posts[0]->image) }}" alt="{{ $posts[0]->image }}">
    @else
    <img class="card-img-top" src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}">
    @endif
    <div class="card-body">
        <h4 class="card-title text-primary text-center"><a class="text-decoration-none" href="/post/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h4>
        <small><a class="text-decoration-none text-dark" href="/posts?author={{ $posts[0]->author->username }}">{{$posts[0]->author->name }}</a> |
            <a class="text-decoration-none text-success" href="/posts?category={{ $posts[0]->category->slug }}">{{$posts[0]->category->name }}</a> </small>
        <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/post/{{ $posts[0]->slug }}" class="btn btn-primary btn-sm">Selengkapnya...</a>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post )
        <div class="col-md-4 mb-3">
            <div class="card">
                <label style="background-color: rgba(0, 0, 0, 0.6);" class="position-absolute px-3 py-2"><a class="text-decoration-none text-white fw-bold" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></label>
                @if ($post->image)
                <img class="card-img-top" src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->image }}">
                @else
                <img class="card-img-top" src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><a href="/post/{{ $post->slug }}" style="text-decoration: none">{{ $post->title }}</a></h5>
                    <small><a class="text-decoration-none text-dark" href="/posts?author={{ $post->author->username }}">{{$post->author->name }}</a> | <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </small>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/post/{{ $post->slug }}" class="btn btn-primary btn-sm">Selengkapnya...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-danger fs-3">Post Not Found</p>
@endif
<div class="container mb-5 d-flex justify-content-end">
    {{ $posts->links() }}
</div>
@endsection
