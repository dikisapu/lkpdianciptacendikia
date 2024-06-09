<?php

namespace App\Models;

use App\Enums\StatusTransaksiEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status_transaksi' => StatusTransaksiEnum::class
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instruktur()
    {
        return $this->belongsTo(User::class, 'instruktur_id');
    }

    public function scopeJadwal($q)
    {
        return $q->where('status_transaksi', StatusTransaksiEnum::SUDAH_DIBAYAR->value);
    }

    protected function getTglTransaksiFormatAttribute($key)
    {
        return Carbon::parse($this->tgl_transaksi)->isoFormat('LL');
    }

    protected function getTglMulaiFormatAttribute($key)
    {
        return Carbon::parse($this->tgl_mulai)->isoFormat('LL');
    }

    protected function getTglBayarFormatAttribute($key)
    {
        return Carbon::parse($this->tgl_bayar)->isoFormat('LL');
    }

    protected function getBuktiBayarUrlAttribute($key)
    {
        if ($this->bukti_bayar && Storage::disk('public')->exists('bukti_bayar/' . $this->bukti_bayar)) {
            return asset('storage/bukti_bayar/' . $this->bukti_bayar);
        }

        return asset('image_not_available.png');
    }
}
