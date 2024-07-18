<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function isImage($path): bool
    {
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type(Storage::disk('public')->path($path));
        if (in_array($contentType, $allowedMimeTypes)) {
            return true;
        }
        return false;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
