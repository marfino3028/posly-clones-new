<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $table = 'product_variants';

    protected $fillable = [
        'product_id', 'code', 'name', 'cost', 'price', 'attribute_variant_id'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'cost' => 'double',
        'price' => 'double',
    ];

    public function productAttribute()
    {
        return $this->belongsTo(VariantAttribute::class, 'variant_attribute_id');
    }

    public function productAttributeValue()
    {
        return $this->belongsTo(VariantAttributeValue::class, 'variant_attribute_value_id');
    }
}