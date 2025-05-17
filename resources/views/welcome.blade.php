<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Image CDN</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class="body-class">
    <div class="container-fluid vh-100" style="background-image: url({{asset('assets/images/background.jpg')}});    background-repeat: no-repeat;
  background-size: cover;  background-position: center;">
        <div class="row">
            <div class="col-12 ">
                <div class="mx-auto text-center align-items-center">
                    <header class="container mx-auto">
                        @if (Route::has('login'))
                            <nav class="mt-4">
                                @auth
                                    <a
                                        href="{{ url('/home') }}"
                                        class="btn btn-primary"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="btn btn-primary"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="btn btn-primary">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
                    <div class="">
                        <main class="">
                            <h1 class="fw-bold text-primary"> Image CDN and Converted </h1>
                        </main>
                    </div>

                    @if (Route::has('login'))
                        <div class="h-14.5 hidden lg:block"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
