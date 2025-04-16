<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- preloader js --}}
    {{-- <script src="{{ asset('js/preloader.js') }}"></script> --}}

    {{-- preloader css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
            // Set cookie dengan durasi 5 menit
            document.cookie = "screen_width=" + screenWidth + "; path=/; max-age=300";
    
            // Jika resolusi kurang dari 1024px, refresh agar middleware mendeteksi perubahan
            if (screenWidth < 1024) {
                location.reload();
            }
        });
    
        // Deteksi perubahan ukuran layar (untuk dev tools)
        window.addEventListener("resize", function() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            document.cookie = "screen_width=" + screenWidth + "; path=/; max-age=300";
    
            if (screenWidth < 1024) {
                location.reload();
            }
        });
    </script> --}}

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script>
    

    
</head>
<body>
    {{-- <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> --}}

    


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #000;">
            <div class="container">
                <div id="google_translate_element"></div>
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('img/tristar_e_pos_2.png') }}" height="55px" style="background-size: cover">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('home') }}" wire:navigate class="btn {{ request()->routeIs('home') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Beranda
                        </a>
                        @if (auth()->user()?->peran === 'admin')
                            <a href="{{ route('user') }}" wire:navigate class="btn {{ request()->routeIs('user') ? 'btn-primary' : 'btn-outline-primary' }}">
                                Pengguna
                            </a>
                            <a href="{{ route('produk') }}" wire:navigate class="btn {{ request()->routeIs('produk') ? 'btn-primary' : 'btn-outline-primary' }}">
                                Produk
                            </a>
                        @endif
                        <a href="{{ route('transaksi') }}" wire:navigate class="btn {{ request()->routeIs('transaksi') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Transaksi
                        </a>
                        <a href="{{ route('lihat-produk') }}" wire:navigate class="btn {{ request()->routeIs('lihat-produk') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Lihat Produk
                        </a>
                        <a href="{{ route('laporan') }}" wire:navigate class="btn {{ request()->routeIs('laporan') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Laporan
                        </a>
                    </div>
                </div>
            </div>
            {{ $slot }}

            
    </div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

    
    </div>

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
