<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function getHargaRpAttribute($key)
    {
        return number_format($this->harga, 0, ',', '.');
    }

    protected function getFotoUrlAttribute()
    {
        if ($this->foto && Storage::disk('public')->exists('cover/' . $this->foto)) {
            return asset('storage/cover/' . $this->foto);
        }

        return asset('image_not_available.png');
    }
}
