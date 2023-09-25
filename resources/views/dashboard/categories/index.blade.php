@extends('dashboard.layouts.main')

@section('content')
<h1>{{ $title }}</h1>
<div class="row">
    <div class="col-lg-6">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Add Category</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="bg-dark">
                    <tr>
                        <th>No.</th>
                        <th>Category Name </th>
                        <th>Slug</th>
                        <th class="text-center">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr class="active">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm" href="{{ route('posts.show', $category->slug) }}"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-warning btn-sm" href="{{ route('posts.edit', $category->slug) }}"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('posts.destroy', $category->slug) }}" method="post" class="d-inline">
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
