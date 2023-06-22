<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModelOrder extends Model
{
    use HasFactory;
    protected $table = 'item_model_orders';
    protected $fillable = [
        'order_id',
        'model_id',
        'name',
        'available_date',
    ];
}
