@extends('auth.layouts')

@section('content')
<form action="/register" method="POST">
    @csrf
    <h3>{{ $title }}</h3>
    {{-- Name --}}
    <input type="text" placeholder="fullname" id="name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required>
    @error('name')
        <small class="invalid-feedback"> {{ $message }} </small>
    @enderror
    {{-- Username --}}
    <input type="text" placeholder="username" id="username" name="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" required>
    @error('username')
    <small class="invalid-feedback"> {{ $message }} </small>
    @enderror
    {{-- Email Address --}}
    
    <input type="text" placeholder="Email address" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
     @error('email')
     <small class="invalid-feedback"> {{ $message }} </small>
     @enderror
    {{-- Password --}}
    <input type="password" placeholder="Password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
     @error('password')
     <small class="invalid-feedback"> {{ $message }} </small>
     @enderror
    <button type="submit">Register</button>
    <div class="social">
        <a href="/login">Login ?</a>
    </div>
</form>
@endsection
