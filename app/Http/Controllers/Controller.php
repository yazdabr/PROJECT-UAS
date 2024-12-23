<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);


class PersonalController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required',
            'instagram' => 'nullable',
            'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('personals', 'public');
        }

        Personal::create($validated);

        return redirect()->back()->with('success', 'Personal created successfully.');
    }
}
class WelcomeController extends Controller
{
    public function index()
    {
        $teamMembers = Personal::all(); // Mengambil semua data dari tabel personal
        return view('welcome', compact('teamMembers'));
    }
}

