<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.2.0/ckeditor5-premium-features.css" />
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/",
                "ckeditor5-premium-features": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.2.0/ckeditor5-premium-features.js",
                "ckeditor5-premium-features/": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.2.0/"
            }
        }
    </script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        .promo-banner {
            min-height: 130px;
        }

        .sectionContent {
            min-height: 100vh;
        }
    </style>

    @yield('css')
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow" style="background-color: #e3f2fd;" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/msib-kampus-merdeka.png') }}" alt="Logo" width="30" height="30"
                    class="d-inline-block align-text-top" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav " style="width: 108%;">
                    <li class="nav-item">
                        <a class="nav-link menu {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu  {{ request()->routeIs('posts.index') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">Post</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link menu {{ request()->routeIs('mypost') ? 'active' : '' }}"
                                href="{{ route('mypost') }}">My Post</a>
                        </li>

                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                            <a class="nav-link menu {{ request()->routeIs('category.index') ? 'active' : '' }}"
                                href="{{ route('category.index') }}">Category</a>
                        </li>
                        @endif
                    @endif

                </ul>

                @if (Auth::check())
                    <ul class="navbar-nav me-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (Auth::user()->avatar == null)
                                    <img src="{{ asset('images/user/default.png') }}" alt="" width="30"
                                        height="30" class="me-1" style="border-radius: 100%;">
                                @else
                                    <img src="{{ asset('images/user/' . Auth::user()->avatar) }}" alt=""
                                        width="30" height="30" class="me-1" style="border-radius: 100%;">
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    @if (Auth::user()->avatar == null)
                                        <img src="{{ asset('images/user/default.png') }}" alt="" width="30"
                                            height="30" class="me-1" style="border-radius: 100%;">
                                    @else
                                        <img src="{{ asset('images/user/' . Auth::user()->avatar) }}" alt=""
                                            width="30" height="30" class="me-1" style="border-radius: 100%;">
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <a class="dropdown-item" href="{{ route('profile') }}"><i
                                        class="fa-solid fa-user me-2"></i>Profile</a>
                                <a class="dropdown-item" href="{{ route('changepassword') }}"><i class="fa-solid fa-gear me-2"></i>Change Password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
                @endif
            </div>
        </div>
    </nav>

    @yield('carousel')

    <div class="container mt-3 sectionContent">
        @yield('content')
    </div>

    <div class="bg-dark text-white mt-5 p-4">
        <div class="container">
            <p class="text-center">Copyright &copy; 2023 - {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/r-3.0.3/datatables.min.js"></script>

    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });

        $(document).ready(function() {
            $('.dataTable').DataTable();
        });
    </script>
</body>

</html>
