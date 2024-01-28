<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variant_attributes';
    protected $fillable = [
        'variant_code',
        'variant_name'
    ];

    public function attributeValue()
    {
        return $this->hasMany(VariantAttributeValue::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'attribute_variant_id', 'id');
    }
}
