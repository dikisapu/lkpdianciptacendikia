<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = [];
        if ($request->tgl_mulai && $request->tgl_sampai) {
            $transaksi = Transaksi::query()
                ->whereBetween('tgl_transaksi', [$request->tgl_mulai, $request->tgl_sampai])
                ->orderByDesc('created_at')
                ->paginate(10);
        }
        return view('laporan.index', compact('transaksi'));
    }

    public function cetak(Request $request)
    {
        $transaksi = Transaksi::query()
            ->whereBetween('tgl_transaksi', [$request->tgl_mulai, $request->tgl_sampai])
            ->orderByDesc('created_at')
            ->get();
        return view('laporan.cetak', compact('transaksi'));
    }
}
