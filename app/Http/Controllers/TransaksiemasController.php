<?php

namespace App\Http\Controllers;

use App\Models\Transaksiemas;
use Illuminate\Http\Request;

class TransaksiemasController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produkemas_id' => 'required|exists:produkemas,id',
            'personal_id' => 'required|exists:personals,id',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
            'transaction_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'transaction_date' => 'required|date',
        ]);

        // Simpan file bukti transaksi jika ada
        $filePath = null;
        if ($request->hasFile('transaction_photo')) {
            $filePath = $request->file('transaction_photo')->store('uploads/transaksiemas', 'public');
        }

        // Simpan data ke database
        Transaksiemas::create([
            'produkemas_id' => $request->produkemas_id,
            'personal_id' => $request->personal_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'transaction_photo' => $filePath,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->back()->with('success', 'Transaksi emas berhasil disimpan!');
    }
}
