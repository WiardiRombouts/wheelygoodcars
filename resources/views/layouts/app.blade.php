<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WheelyGoodCars</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark d-print-none bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><strong class="text-primary">Wheely</strong> good
                cars<strong class="text-primary">!</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-primary" href="https://getbootstrap.com/">Bootstrap link</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ Route('show_all_cars_page') }}">Alle
                            auto's</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link text-light" href="{{ Route('show_personal_cars') }}">Mijn
                                aanbod</a></li>
                        <li class="nav-item"><a class="nav-link text-light"
                                href="{{ Route('show_new_license_plate_page') }}">Aanbod plaatsen</a></li>
                    @endauth
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item"><a class="nav-link text-secondary"
                                href="{{ route('register') }}">Registreren</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('login') }}">Inloggen</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('logout') }}">Uitloggen</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('main')
    </div>
</body>

</html>
