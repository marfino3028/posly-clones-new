<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title','is_default','nama_pemilik','no_rekening'
    ];

    protected $casts = [
        'is_default' => 'integer',
    ];
}
