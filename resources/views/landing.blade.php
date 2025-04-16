<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        html, body {
            height: 100%;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body style="background-color: #000">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" style="font-weight: bolder" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nama }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid mt-5">
        @guest
            <h1 class="text-white text-center">Selamat datang di <span style="font-weight: bolder">TRISTAR</span> E-POS</h1>
            <p class="text-white text-center">Untuk menggunakan silahkan login terlebih dahulu</p>
        @else
            <h1 class="text-white text-center">Selamat datang di <span style="font-weight: bolder">TRISTAR</span> E-POS</h1>
            <p class="text-white text-center">Silahkan menggunakan dan selamat bekerja</p>
            <div class="justify-content-center d-flex">
                <a href="/home" class="btn btn-outline-light">Buka <span style="font-weight: bolder">TRISTAR</span> E-POS sekarang</a>
            </div>
        @endguest
    </main>
    <footer class="text-white text-center py-3 fixed-bottom" style="font-weight: 200; background-color: #000">
        <i><p>Versi rilis beta 1.0 (tidak untuk umum atau publik)</p></i>
        <p>&copy; {{ date('Y') }} TRISTAR CORP (IT DIVISON). Hak cipta dilindungi</p>
    </footer>

    <div class="modal fade" id="resolutionWarningModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resolutionWarningLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="resolutionWarningLabel">Resolusi Layar Terlalu kecil</h5>
                </div>
                <div class="modal-body">
                    <p>Mohon gunakan perangkat dengan resolusi minimal <strong>768px</strong></p>
                </div>
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
           const modalEl = new bootstrap.Modal(document.getElementById('resolutionWarningModal'), {
                backdrop: 'static',
                keyboard: false
           });

           function checkResolution() {
                const width = window.innerWidth;
                if (width < 768) {
                    modalEl.show();
                } else {
                    modalEl.hide();
                }
           }

           checkResolution();
           window.addEventListener('resize', checkResolution);
        });
    </script>

    
</body>
</html>