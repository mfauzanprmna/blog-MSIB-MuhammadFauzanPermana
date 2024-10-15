@extends('layouts.layout')

@section('title', 'Tabel Post')

@section('content')
    <ul class="nav justify-content-center mb-4">
        <li class="nav-item">
            <a class="btn rounded-lg ms-2 {{ !isset($_GET['id']) ? 'btn-success' : 'btn-outline-success'}}" aria-current="page" href="{{ route('posts.index') }}">All</a>
        </li>
        @foreach ($categories as $category)
            <li class="nav-item">
                <a class="btn rounded-lg ms-2 {{ isset($_GET['id']) && $_GET['id'] == $category->id ? 'btn-success' : 'btn-outline-success' }}"
                    href="{{ route('posts.category', $category->id) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
    <div class="d-flex flex-wrap">
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="card ms-3 mb-3" style="width: 18rem;">
                    <img src="{{ asset('storage/post/' . $post->image) }}" alt="" class="w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! Str::substr($post->content, 0, 40) !!}...</p>
                        <a href="{{ route('posts.slug', $post->slug) }}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="mt-3">
                <h3>No Post</h3>
            </div>
        @endif
    </div>

@endsection
