@extends('layouts.layout')

@section('title', 'Dashboard')

@section('carousel')
    <div class="container mt-5">
        <!-- Carousel -->
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Carousel Item 1 -->
                <div class="carousel-item active bg-info p-3 rounded">
                    <div class="promo-banner m-2">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2>Memublikasikan tulisan Anda sesuai selera</h2>
                                <p>Buat blog yang unik dan menarik.</p>
                                <a href="{{ route('posts.create') }}" class="btn btn-light">Buat Blog Anda</a>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('items/rb_2148955260.png') }}" alt="Promo Image 1" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 2 -->
                <div class="carousel-item bg-warning p-3 rounded">
                    <div class="promo-banner m-2">
                        <div class="row align-items-center ">
                            <div class="col-md-8">
                                <h2>Menyimpan kenangan Anda!</h2>
                                <p>Simpan berbagai momen yang berarti. Blogger memungkinkan Anda menyimpan secara aman
                                    ribuan postingan, foto, dan lainnya dengan Google.</p>
                            </div>
                            <div class="col-md-4 img-carousel-2">
                                <img src="{{ asset('items/rb_2149247166.png') }}" alt="Promo Image 2" class="h-100 w-100">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 3 -->
                <div class="carousel-item bg-danger p-3 rounded">
                    <div class="promo-banner m-2">
                        <div class="row align-items-center ">
                            <div class="col-md-8">
                                <h2>Bergabunglah dengan jutaan orang lain</h2>
                                <a href="{{ route('posts.create') }}" class="btn btn-light">Buat Blog Anda</a>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('items/rb_324.png') }}" alt="Promo Image 3" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
    </div>

@endsection

@section('content')

@endSection
