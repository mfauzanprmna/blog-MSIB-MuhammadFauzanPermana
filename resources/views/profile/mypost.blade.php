@extends('layouts.layout')

@section('title', 'My Post')

@section('content')

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Buat Post</a>
    <table class="table table-striped table-bordered dataTable" data-page-length='25'>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Slug</th>
                <th>Publish</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        @if ($user->posts->count() > 0)
            @foreach ($user->posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{!! $post->content !!}</td>
                    <td>
                        @if ($post->image)
                            <img src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->title }}" width="100">
                        @else
                            <img src="{{ asset('storage/post/default') }}" alt="{{ $post->title }}" width="100">
                        @endif
                    </td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        @if ($post->is_published)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-danger">Unpublished</span>
                        @endif
                    </td>
                    <td><span class="p-2 rounded">{{ $post->category->name }}</span></td>
                    <td>
                        <a href="{{ route('posts.slug', $post->slug) }}" class="btn btn-primary mb-2">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mb-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">Delete</button>
                        </form>
                        <form action="{{ route('posts.publish', $post->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @if ($post->is_published)
                                <button type="submit" class="btn btn-secondary">Unpublish</button>
                            @else
                                <button type="submit" class="btn btn-primary">Publish</button>
                            @endif
                        </form>
                    </td>
            @endforeach
        @else
            <tr>
                <td colspan="8">No posts</td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
            </tr>
        @endif
    </table>
@endsection
