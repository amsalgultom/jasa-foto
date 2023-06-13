<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'date',
        'shipping_costs',
        'shipping_method',
        'total',
        'status_id',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer');
    }

    public function status()
    {
    	return $this->belongsTo('App\Models\Status');
    }

}
