<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::query()
            ->with('member', 'paket')
            ->jadwal()
            ->paginate(3);
        return view('jadwal.index', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $instruktur = User::query()
            ->instruktur()
            ->get();
        return view('jadwal.detail', compact('transaksi', 'instruktur'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'hari' => ['required'],
            'range_jam' => ['required'],
            'instruktur_id' => ['required'],
        ]);

        $transaksi->update($data);
        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('jadwal.index');
    }

    public function cetak()
    {
        $transaksi = Transaksi::query()
            ->with('member', 'paket')
            ->jadwal()
            ->get();
        return view('jadwal.cetak', compact('transaksi'));
    }
}
