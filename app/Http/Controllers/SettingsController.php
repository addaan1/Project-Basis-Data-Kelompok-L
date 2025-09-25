<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Daftar gambar yang tersedia
        $backgrounds = [
            'Background 1' => asset('images/Background.jpg'),
            'Background 2' => asset('images/Homepage.jpg'),
        ];

        return view('settings.index', compact('backgrounds'));
    }

    public function updateBackground(Request $request)
    {
        $request->validate([
            'background_url' => 'required|string',
        ]);

        // Simpan URL background yang dipilih ke dalam session
        session(['background_url' => $request->background_url]);

        return redirect()->route('settings.index')->with('success', 'Gambar latar berhasil diubah.');
    }
}