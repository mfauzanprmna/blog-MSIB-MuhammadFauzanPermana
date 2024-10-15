<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="h-100 d-flex">
        <div class="login m-auto">
        <div class="container shadow-lg p-5">
            <div class="d-flex flex-row">
                <div class="col w-100">
                    <img src="{{ asset('images/msib-kampus-merdeka.png') }}" alt="Laravel" class="img-fluid">
                </div>
                <div class="form col m-auto">
                    <h3 class="text-center mb-5 mt-3 fw-bold">Login Blog MSIB</h3>
                    <form action="{{ route('login.user') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="mt-3">
                        Ga punya akun? <a href="{{ route('register') }}">Ayo bikin akun</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success') || session()->has('error'))
        @extends('sweetalert::alert')
    @endif
</body>

</html>
