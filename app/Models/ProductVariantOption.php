<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_variant_id',
        'attribute_id',
        'additional_cost',
        'additional_price',
    ];
}
