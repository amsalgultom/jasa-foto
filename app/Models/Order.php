<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'customer_id',
        'date',
        'shipping_costs',
        'shipping_method',
        'voucher',
        'discount',
        'total',
        'status_id',
        'image_referensi_product',
        'photobackground',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer');
    }

    public function ItemModelOrder()
    {
    	return $this->hasOne('App\Models\ItemModelOrder');
    }

    public function status()
    {
    	return $this->belongsTo('App\Models\Status');
    }
    

}
