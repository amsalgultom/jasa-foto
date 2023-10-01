<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_voucher',
        'description',
        'type',
        'value_discount',
        'max_value_price_discount',
        'min_price_order',
        'min_product_order',
        'status',
        'include_model',
    ];

    // public function setIncludeModelAttribute($value)
    // {
    //     // Ensure that $value is an array
    //     if (is_array($value)) {
    //         $this->attributes['include_model'] = implode(',', $value);
    //     } else {
    //         $this->attributes['include_model'] = $value;
    //     }
    // }
}
