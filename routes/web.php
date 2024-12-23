<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukemasController;
use App\Http\Controllers\TransaksiemasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Models\Personal;



Route::get('/personals', function () {
    $teamMembers = Personal::all(); // Mengambil semua data dari tabel personals
    return view('personals', compact('teamMembers')); // Kirim data ke view
});


Route::get('/', [HomeController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index']);

Route::post('/produkemas', [ProdukemasController::class, 'store'])->name('produkemas.store');
Route::post('/transaksiemas', [TransaksiemasController::class, 'store'])->name('transaksiemas.store');


Route::get('/', function () {
    return view('welcome');
});
