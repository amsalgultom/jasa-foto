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
        'name_product',
        'price_product',
        'qty_product',
        'sub_total_product',
        'note_product',
        'image_referensi_product',
        'note'
    ];
}
