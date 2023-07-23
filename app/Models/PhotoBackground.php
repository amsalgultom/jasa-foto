<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoBackground extends Model
{
    use HasFactory;
    protected $table = 'photobackgrounds';
    protected $fillable = [
        'name',
        'status',
        'image',
    ];
}
