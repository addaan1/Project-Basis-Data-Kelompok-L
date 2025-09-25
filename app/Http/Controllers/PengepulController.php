<?php

namespace App\Http\Controllers;

use App\Models\Pengepul;
use Illuminate\Http\Request;

class PengepulController extends Controller
{
    public function index()
    {
        $pengepul = Pengepul::all();
        return view('pengepul.index', compact('pengepul'));
    }

    public function create()
    {
        return view('pengepul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required',
            'kapasitas_tampung' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        Pengepul::create($request->all());

        return redirect()->route('pengepul.index')
                         ->with('success', 'Data pengepul baru berhasil ditambahkan.');
    }

    public function show(Pengepul $pengepul)
    {
        // Not used for now
    }

    public function edit(Pengepul $pengepul)
    {
        return view('pengepul.edit', compact('pengepul'));
    }

    public function update(Request $request, Pengepul $pengepul)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required',
            'kapasitas_tampung' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        $pengepul->update($request->all());

        return redirect()->route('pengepul.index')
                         ->with('success', 'Data pengepul berhasil diperbarui.');
    }

    public function destroy(Pengepul $pengepul)
    {
        $pengepul->delete();

        return redirect()->route('pengepul.index')
                         ->with('success', 'Data pengepul berhasil dihapus.');
    }
}