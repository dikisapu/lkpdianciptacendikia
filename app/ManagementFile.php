<?php

namespace App;

use Illuminate\Support\Facades\Storage;

trait ManagementFile
{
    public function removeFile($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    function kode_transaksi()
    {
        $tahun = substr(date('Y'), -2, 2);
        $trx = \App\Models\Transaksi::orderByDesc('id')->first();
        if ($trx) {
            $terahir = substr($trx->kode, -4, 4);
        } else {
            $terahir = 0;
        }
        $terahir++;
        $kode = "TRX-" . $tahun . "-" . sprintf("%04s", $terahir);
        return $kode;

    }
}
