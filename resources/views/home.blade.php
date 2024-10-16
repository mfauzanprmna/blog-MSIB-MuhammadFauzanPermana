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
    @foreach ($categories as $category)
        <h3>{{ $category->name }}</h3>

        <div id="cardCarousel{{ $category->id }}" class="carousel slide">
            <div class="carousel-inner">
                @if ($category->posts->count() > 0)
                    @foreach ($category->posts->chunk(4) as $post)
                        <!-- Split cards into groups of 4 -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($post as $data)
                                    <div class="col-md-3">
                                        <div class="card mb-4">
                                            <img src="{{ asset('storage/post/' . $data->image) }}" class="card-img-top"
                                                alt="Image">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $data->title }}</h5>
                                                <p class="card-text">{!! Str::substr($data->content, 0, 40) !!}...</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                @else
                    <h5>No Post in Category</h5>
                @endif
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel{{ $category->id }}"
                data-bs-slide="prev">
                <i class="fa-solid fa-circle-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel{{ $category->id }}"
                data-bs-slide="next">
                <i class="fa-solid fa-circle-chevron-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endforeach
@endSection



@section('css')

    <style>
        @foreach ($categories as $category)
            #cardCarousel{{ $category->id }}:hover .carousel-control-prev,
            #cardCarousel{{ $category->id }}:hover .carousel-control-next {
                opacity: 100%;
                transition: opacity 0.5s ease;
            }

            @if ($category->posts->count() < 5)
                #cardCarousel{{ $category->id }}:hover .carousel-control-prev,
                #cardCarousel{{ $category->id }}:hover .carousel-control-next {
                    opacity: 0;
                }
            @endif
        @endforeach

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 1);
            /* Semi-transparent background */
            border-radius: 50%;
            /* Make it round */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            /* Add shadow */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            opacity: 0;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            font-size: 20px;
            color: white;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
            /* Darken background on hover */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background: none;
            /* Remove default background image */
        }
    </style>
@endsection
