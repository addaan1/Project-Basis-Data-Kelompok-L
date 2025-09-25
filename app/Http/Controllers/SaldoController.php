<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldos = Saldo::with('user')->latest()->get();
        return view('saldo.index', compact('saldos'));
    }

    public function create()
    {
        $users = User::all();
        return view('saldo.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'saldo'      => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'id_user'    => 'required|exists:users,id_user',
        ]);

        Saldo::create($request->all());
        return redirect()->route('saldo.index')->with('success', 'Data saldo berhasil ditambahkan.');
    }

    public function edit(Saldo $saldo)
    {
        $users = User::all();
        return view('saldo.edit', compact('saldo', 'users'));
    }

    public function update(Request $request, Saldo $saldo)
    {
        $request->validate([
            'saldo'      => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'id_user'    => 'required|exists:users,id_user',
        ]);

        $saldo->update($request->all());
        return redirect()->route('saldo.index')->with('success', 'Data saldo berhasil diperbarui.');
    }

    public function destroy(Saldo $saldo)
    {
        $saldo->delete();
        return redirect()->route('saldo.index')->with('success', 'Data saldo berhasil dihapus.');
    }
}