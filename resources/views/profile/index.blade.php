@extends('layouts.layout')

@section('title', 'Profile')

@section('content')


    
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
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <p class="card-text">Email : {{ Auth::user()->email }}</p>
                    <p class="card-text">Role : {{ Auth::user()->role }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

@endsection