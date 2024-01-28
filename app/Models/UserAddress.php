<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'users_address';
    protected $fillable = [
        'users_id',
        'villages',
        'district',
        'city',
        'province',
        'country',
        'alamat',
        'kode_pos',
    ];

    // Jika diperlukan, definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
