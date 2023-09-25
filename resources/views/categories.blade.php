@extends('layouts.main')
@section('main')
<div class="container">
    <div class="row">
        @foreach ($categories as $category )
        <div class="col-md-4 mb-3">
            <a href="/posts?category={{ $category->slug }}">
                <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title flex-fill p-3 fs-3 text-center" style="background-color: rgba(0, 0, 0, 0.6)">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
