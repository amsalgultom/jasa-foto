<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProductOrder extends Model
{
    use HasFactory;
    protected $table = 'item_product_orders';
    protected $fillable = [
        'order_id',
        'product_id',
        'note'
    ];
}
