<?php

namespace App\Http\Controllers;

use App\Models\EWallet;
use App\Models\User;
use Illuminate\Http\Request;

class EWalletController extends Controller
{
    public function index()
    {
        $ewallets = EWallet::with('user')->latest()->get();
        return view('ewallet.index', compact('ewallets'));
    }

    public function create()
    {
        $users = User::all();
        return view('ewallet.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'saldo'   => 'required|numeric|min:0',
            'id_user' => 'required|exists:users,id_user',
        ]);

        EWallet::create($request->all());
        return redirect()->route('ewallet.index')->with('success', 'E-Wallet berhasil dibuat.');
    }

    public function edit(EWallet $ewallet)
    {
        $users = User::all();
        return view('ewallet.edit', compact('ewallet', 'users'));
    }

    public function update(Request $request, EWallet $ewallet)
    {
        $request->validate([
            'saldo'   => 'required|numeric|min:0',
            'id_user' => 'required|exists:users,id_user',
        ]);

        $ewallet->update($request->all());
        return redirect()->route('ewallet.index')->with('success', 'E-Wallet berhasil diperbarui.');
    }

    public function destroy(EWallet $ewallet)
    {
        $ewallet->delete();
        return redirect()->route('ewallet.index')->with('success', 'E-Wallet berhasil dihapus.');
    }
}