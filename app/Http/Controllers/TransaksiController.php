<?php

namespace App\Http\Controllers;

use App\Enums\StatusTransaksiEnum;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = StatusTransaksiEnum::MENUNGGU_PEMBAYARAN->value;
        if ($request->status) {
            $status = $request->status;
        }
        $transaksi = Transaksi::query()
            ->with('member', 'paket')
            ->where('status_transaksi', $status)
            ->paginate(5);
        return view('transaksi.index', compact('transaksi', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        $instruktur = User::query()
            ->instruktur()
            ->get();
        return view('transaksi.detail', compact('transaksi', 'instruktur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function saveInstruktur(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'instruktur_id' => ['required'],
            'tgl_mulai' => ['required']
        ]);

        $transaksi->update([
            'tgl_mulai' => date('Y-m-d', strtotime($request->tgl_mulai)),
            'instruktur_id' => $request->instruktur_id,
            'status_transaksi' => StatusTransaksiEnum::SUDAH_DIBAYAR->value
        ]);
        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->back();
    }
}
