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

    protected function getTglTransaksiFormatAttribute()
    {
        return Carbon::parse($this->tgl_transaksi)->isoFormat('LL');
    }

    protected function getTglMulaiFormatAttribute()
    {
        if (!$this->tgl_mulai) {
            return '-';
        }
        return Carbon::parse($this->tgl_mulai)->isoFormat('LL');
    }

    protected function getTglBayarFormatAttribute()
    {
        return Carbon::parse($this->tgl_bayar)->isoFormat('LL');
    }

    protected function getBuktiBayarUrlAttribute()
    {
        if ($this->bukti_bayar && Storage::disk('public')->exists('bukti_bayar/' . $this->bukti_bayar)) {
            return asset('storage/bukti_bayar/' . $this->bukti_bayar);
        }

        return asset('image_not_available.png');
    }

    public function isImage($path): bool
    {
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type(Storage::disk('public')->path($path));
        if (in_array($contentType, $allowedMimeTypes)) {
            return true;
        }
        return false;
    }
}
