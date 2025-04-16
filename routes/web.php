<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\BlockWarningPage;
use App\Http\Middleware\CheckScreenResolution;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ScreenResolutionMiddleware;
use App\Http\Middleware\ScreenSizeMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Beranda;
use App\Livewire\Laporan;
use App\Livewire\LihatProduk;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use App\Livewire\User;

// Route::middleware([CheckScreenResolution::class], [ScreenResolutionMiddleware::class])->group(function () {
// });
Route::get('/', function () {
    return view ('landing', [
        'title' => 'Welcome to TRISTAR E-POS'
    ]);
});

// Route::get('/warning', function () {
//     return view('warning');
// })->middleware(BlockWarningPage::class);

Auth::routes([
    'register'  => false,
    'reset'  =>  false,
]);

// Route::middleware(ScreenSizeMiddleware::class)->group(function () {
// });
// Route::get('/screen-warning', function () {
//     return view('screen_warning');
// })->name('screen.warning')->middleware(ScreenSizeMiddleware::class);
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/user', User::class)->middleware(['auth'])->name('user');
    Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
});

Route::get('/lihat-produk', LihatProduk::class)->middleware(['auth'])->name('lihat-produk');
Route::get('/home', Beranda::class)->middleware(['auth'])->name('home');

Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);


// Route::get('/check-resolution', function () {
//     return view('check-resolution');
// })->name('check-resolution');

// Route::get('/resolution-warning', function () {
//     if (!session()->has('screen_width') || session('screen_width') >= 720) {
//         abort(403); // Forbidden jika diakses langsung
//     }
//     return view('resolution-warning');
// })->name('resolution-warning');



// Route::get('/screen-warning', function () {
//     if (!session('access_denied', false)) {
//         abort(403);
//     }
//     return view('screen-warning');
// })->name('screen-warning');

// Route::get('/check-resolution', function () {
//     return view('check_resolution');
// });

// Route::get('/screen_too_small', function (){
//     return view('errors.screen_to_small');
// })->middleware([CheckScreenResolution::class]);

