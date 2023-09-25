@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <div class="alert alert-success alert-dismissable text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Welcome to dashboard : <Strong>{{ auth()->user()->name }}</Strong>
        </div>
    </div>
</div>
@endsection
