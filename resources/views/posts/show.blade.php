@extends('layouts.layout')

@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

    <div class="w-100 d-flex">
        @if ($post->image)
        <img src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->title }}" class="w-50 m-auto">
    @else
        <img src="{{ asset('storage/post/default') }}" alt="{{ $post->title }}" class="w-50 m-auto">
    @endif
    </div>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <p>Category: {{ $post->category->name }}</p>
    <p>Author: {{ $post->author->name }}</p>
@endsection
