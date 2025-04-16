@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>⚠️ Resolusi Layar Terlalu Kecil</h1>
    <p>Silakan gunakan perangkat dengan resolusi minimal 720px untuk mengakses website ini.</p>
</div>

<script>
    // Cek ukuran layar saat halaman dimuat
    function checkScreenSize() {
        let screenWidth = window.innerWidth;
        sessionStorage.setItem('screen_width', screenWidth);
        window.location.reload(); // Reload halaman untuk menerapkan middleware
    }

    // Simpan ukuran layar ke sesi setiap perubahan ukuran
    window.onload = checkScreenSize;
    window.onresize = checkScreenSize;
</script>
@endsection
