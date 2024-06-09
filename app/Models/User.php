<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRolesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRolesEnum::class
        ];
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'user_id');
    }

    protected function getFotoUrlAttribute()
    {
        if ($this->foto && Storage::disk('public')->exists('foto/' . $this->foto)) {
            return asset('storage/foto/' . $this->foto);
        }

        return asset('image_not_available.png');
    }

    public function scopeInstruktur($q)
    {
        return $q->where('role', UserRolesEnum::INSTRUKTUR->value);
    }

}
