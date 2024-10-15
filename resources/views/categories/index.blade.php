@extends('layouts.layout')

@section('title', 'Tabel Category')

@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-2">Buat Category</a>

    <table class="table table-striped table-bordered dataTable" data-page-length='25'>
        <thead>
            <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="d-flex">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endSection
