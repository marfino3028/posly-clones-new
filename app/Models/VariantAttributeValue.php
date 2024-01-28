<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantAttributeValue extends Model
{
    use HasFactory;

    protected $table = 'variant_attribute_values';
    protected $fillable = [
        'variant_attribute_id',
        'variant_attribute_value_code',
        'variant_attribute_value_name',
    ];

    public function variantAttribute()
    {
        return $this->belongsTo(VariantAttribute::class);
    }
}
