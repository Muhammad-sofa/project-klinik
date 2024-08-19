<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DaftarController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pasien', PasienController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([Authenticate::class])->group(function() {
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
