@extends('auth.layouts')

@section('content')
<form action="/login" method="POST">
    @csrf
    <h3>{{ $title }} Here</h3>
    <label for="email">Email</label>
    <input type="text" placeholder="Email address" class="@error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autofocus required>
    @error('email')
    <small class="invalid-feedback"> {{ $message }} </small>
    @enderror
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
    @error('password')
    <small class="invalid-feedback"> {{ $message }} </small>
    @enderror
    <button type="submit">Log In</button>
    <div class="social">
        <a href="/register">Register ?</a>
    </div>
</form>
@endsection
