@extends('layouts.layout')

@section('title', 'List Post by Category')

@section('content')
    <h1>{{ $category->name }}</h1>
    <ul>
        @foreach ($category->posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
    <a href="{{ route('category.index') }}">Back</a>
@endSection
