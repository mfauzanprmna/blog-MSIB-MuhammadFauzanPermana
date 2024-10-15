@extends('layouts.layout')

@section('title', 'My Post')

@section('content')

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Buat Post</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Slug</th>
            <th>Publish</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @if ($user->posts->count() > 0)
            @foreach ($user->posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
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
                    <td >
                        <a href="{{ route('posts.slug', $post->slug) }}" class="btn btn-primary mb-2">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mb-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            @endforeach
        @else
            <tr>
                <td colspan="6">No posts</td>
            </tr>
        @endif
    </table>
@endsection
