<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petani;

class PetaniController extends Controller
{
    public function index()
    {
        $petani = Petani::all();
        return view('petani.index', compact('petani'));
    }

    public function create()
    {
        return view('petani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required',
            'kontak' => 'required|numeric',
            'kapasitas_panen' => 'required|integer',
            'id_user' => 'required|integer'
        ]);

        Petani::create($request->all());

        return redirect()->route('petani.index')
                         ->with('success', 'Data petani baru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        // Belum digunakan
    }

    public function edit(string $id)
    {
        $petani = Petani::findOrFail($id);
        return view('petani.edit', compact('petani'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required',
            'kontak' => 'required|numeric',
            'kapasitas_panen' => 'required|integer',
            'id_user' => 'required|integer'
        ]);

        $petani = Petani::findOrFail($id);
        $petani->update($request->all());

        return redirect()->route('petani.index')
                         ->with('success', 'Data petani berhasil diperbarui.');
    }

    /**
     * FUNGSI BARU: Menghapus data.
     */
    public function destroy(string $id)
    {
        // Cari data petani berdasarkan ID dan hapus
        $petani = Petani::findOrFail($id);
        $petani->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('petani.index')
                         ->with('success', 'Data petani berhasil dihapus.');
    }
}