<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = [
        'name',
        'price',
        'available_date',
        'image',
    ];
}
