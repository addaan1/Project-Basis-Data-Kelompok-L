<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;

class PasarController extends Controller
{
    public function index()
    {
        $pasar = Pasar::all();
        return view('pasar.index', compact('pasar'));
    }

    public function create()
    {
        return view('pasar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasar' => 'required|max:255',
            'id_user' => 'required|integer',
        ]);

        Pasar::create($request->all());

        return redirect()->route('pasar.index')
                         ->with('success', 'Data pasar baru berhasil ditambahkan.');
    }

    public function show(Pasar $pasar)
    {
        // Not used
    }

    public function edit(Pasar $pasar)
    {
        return view('pasar.edit', compact('pasar'));
    }

    public function update(Request $request, Pasar $pasar)
    {
        $request->validate([
            'nama_pasar' => 'required|max:255',
            'id_user' => 'required|integer',
        ]);

        $pasar->update($request->all());

        return redirect()->route('pasar.index')
                         ->with('success', 'Data pasar berhasil diperbarui.');
    }

    public function destroy(Pasar $pasar)
    {
        $pasar->delete();

        return redirect()->route('pasar.index')
                         ->with('success', 'Data pasar berhasil dihapus.');
    }
}