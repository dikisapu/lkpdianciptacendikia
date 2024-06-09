<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function getKtpUrlAttribute()
    {
        if ($this->ktp && Storage::disk('public')->exists('ktp/' . $this->ktp)) {
            return asset('storage/ktp/' . $this->ktp);
        }

        return asset('image_not_available.png');
    }

    protected function getKkUrlAttribute()
    {
        if ($this->kk && Storage::disk('public')->exists('kk/' . $this->kk)) {
            return asset('storage/kk/' . $this->kk);
        }

        return asset('image_not_available.png');
    }

    protected function getIjazahUrlAttribute()
    {
        if ($this->ijazah && Storage::disk('public')->exists('ijazah/' . $this->ijazah)) {
            return asset('storage/ijazah/' . $this->ijazah);
        }

        return asset('image_not_available.png');
    }
}
