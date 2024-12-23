<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

class HomeController extends Controller
{
    public function index()
    {
        $teamMembers = Personal::all(); // Mengambil data dari tabel personals
        return view('welcome', compact('teamMembers'));
    }
}

