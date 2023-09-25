@extends('dashboard.layouts.main')

@section('content')
<h1>{{ $title }}</h1>
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Create New Post</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="bg-dark">
                    <tr>
                        <th>No.</th>
                        <th>Title Post </th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th class="text-center">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr class="active">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm" href="{{ route('posts.show', $post->slug) }}"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning btn-sm" href="{{ route('posts.edit', $post->slug) }}"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm border-0" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

