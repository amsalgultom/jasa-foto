<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'type',
        'price',
        'weight',
        'image',
        'model_id',
        'photobackground_id',
    ];
    
    public function model()
    {
    	return $this->belongsTo('App\Models\PhotoModel');
    }
    public function photobackground()
    {
    	return $this->belongsTo('App\Models\PhotoBackground');
    }
}
