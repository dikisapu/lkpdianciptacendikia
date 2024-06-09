<?php

namespace App\Enums;

enum StatusTransaksiEnum: string
{
    case MENUNGGU_PEMBAYARAN = 'Menunggu Pembayaran';
    case MENUNGGU_KONFIRMASI = 'Menunggu Konfirmasi';
    case SUDAH_DIBAYAR = 'Sudah Dibayar';

    public function menungguPembayaran(): bool
    {
        return $this === self::MENUNGGU_PEMBAYARAN;
    }

    public function menungguKonfirmasi(): bool
    {
        return $this === self::MENUNGGU_KONFIRMASI;
    }

    public function sudahDibayar(): bool
    {
        return $this === self::SUDAH_DIBAYAR;
    }
}
