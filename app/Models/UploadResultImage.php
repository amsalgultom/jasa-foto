<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadResultImage extends Model
{
    use HasFactory;
    protected $table = 'upload_result_images';
    protected $fillable = [
        'order_id',
        'images'
    ];
}
