<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventory::with('user')->latest()->get();
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        $users = User::all();
        return view('inventaris.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah'        => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'id_user'       => 'required|exists:users,id_user',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventaris.index')->with('success', 'Inventaris berhasil ditambahkan.');
    }

    public function edit(Inventory $inventaris)
    {
        $users = User::all();
        return view('inventaris.edit', compact('inventaris', 'users'));
    }

    public function update(Request $request, Inventory $inventaris)
    {
        $request->validate([
            'jumlah'          => 'required|integer|min:1',
            'tanggal_masuk'   => 'required|date',
            'tanggal_keluar'  => 'nullable|date|after_or_equal:tanggal_masuk',
            'id_user'         => 'required|exists:users,id_user',
        ]);

        $inventaris->update($request->all());
        return redirect()->route('inventaris.index')->with('success', 'Inventaris berhasil diperbarui.');
    }

    public function destroy(Inventory $inventaris)
    {
        $inventaris->delete();
        return redirect()->route('inventaris.index')->with('success', 'Inventaris berhasil dihapus.');
    }
}