@extends('dashboard.layouts.main')

@section('content')
<h1>{{ $title }}</h1>

<div class="row mb-5">
    <div class="col-lg-6">
        <form role="form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name Category" value="{{ old('name') }}" autofocus required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}" readonly required>
                @error('slug')
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
@endsection
