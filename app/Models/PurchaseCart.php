<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_variant_id',
        'quantity',
        'price',
        'total_price'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    protected $table = 'purchase_cart';
}
