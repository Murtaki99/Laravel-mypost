@extends('layouts.main')
@section('main')
<div class="container-fluid d-flex justify-content-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <div class="d-flex justify-content-center container-fluid" style="width: 200px;">
                <img src="img/{{ $img }}" class="rounded-circle img-thumbnail">
            </div>
            <h3 class="card-title">Selamat Datang </h3>
            <h4 class="card-text">{{ auth()->user()->name }}</h4>
            <p>{{ auth()->user()->email }}</p>
            <a href="#" class="btn btn-primary">Show Detail</a>
        </div>
    </div>
</div>
@endsection
