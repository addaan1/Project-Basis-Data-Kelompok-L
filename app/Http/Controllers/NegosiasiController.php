<?php

namespace App\Http\Controllers;

use App\Models\NegosiasiHarga;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class NegosiasiController extends Controller
{
    public function index()
    {
        $negosiasis = NegosiasiHarga::with(['user', 'transaksi'])->latest()->get();
        return view('negosiasi.index', compact('negosiasis'));
    }

    public function create()
    {
        $users      = User::all();
        $transaksis = Transaksi::all();
        return view('negosiasi.create', compact('users', 'transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi'   => 'required|exists:transaksis,id_transaksi',
            'id_user_penawar'=> 'required|exists:users,id_user',
            'harga_tawaran'  => 'required|numeric|min:0',
            'catatan'        => 'nullable|string',
        ]);

        NegosiasiHarga::create($request->all());
        return redirect()->route('negosiasi.index')->with('success', 'Negosiasi berhasil dibuat.');
    }

    public function edit(NegosiasiHarga $negosiasi)
    {
        $users      = User::all();
        $transaksis = Transaksi::all();
        return view('negosiasi.edit', compact('negosiasi', 'users', 'transaksis'));
    }

    public function update(Request $request, NegosiasiHarga $negosiasi)
    {
        $request->validate([
            'id_transaksi'   => 'required|exists:transaksis,id_transaksi',
            'id_user_penawar'=> 'required|exists:users,id_user',
            'harga_tawaran'  => 'required|numeric|min:0',
            'catatan'        => 'nullable|string',
        ]);

        $negosiasi->update($request->all());
        return redirect()->route('negosiasi.index')->with('success', 'Negosiasi berhasil diperbarui.');
    }

    public function destroy(NegosiasiHarga $negosiasi)
    {
        $negosiasi->delete();
        return redirect()->route('negosiasi.index')->with('success', 'Negosiasi berhasil dihapus.');
    }
}