<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor.index', compact('distributor'));
    }

    public function create()
    {
        return view('distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'wilayah_distribusi' => 'required',
            'id_user' => 'required|integer',
        ]);

        Distributor::create($request->all());

        return redirect()->route('distributor.index')
                         ->with('success', 'Data distributor baru berhasil ditambahkan.');
    }

    public function show(Distributor $distributor)
    {
        // Not used
    }

    public function edit(Distributor $distributor)
    {
        return view('distributor.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'wilayah_distribusi' => 'required',
            'id_user' => 'required|integer',
        ]);

        $distributor->update($request->all());

        return redirect()->route('distributor.index')
                         ->with('success', 'Data distributor berhasil diperbarui.');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        return redirect()->route('distributor.index')
                         ->with('success', 'Data distributor berhasil dihapus.');
    }
}