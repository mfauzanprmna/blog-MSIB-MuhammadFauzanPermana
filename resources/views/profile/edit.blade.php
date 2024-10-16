@extends('layouts.layout')

@section('title', 'Profile')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex d-row">
        <div class="avatar col d-flex justify-content-center m-auto">
            @if (Auth::user()->avatar == '')
                <img src="{{  asset('images/user/default.png') }}" alt="" class="rounded-circle w-25">
            @else
                <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}" alt="" class="rounded-circle">
            @endif
        </div>
        <div class="info col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>  
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('profile') }}" class="btn btn-warning">Cancel</a>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection