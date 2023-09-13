<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassVideos extends Model
{
    use HasFactory;
    
    public $fillable = [
        'class_id',
        'video_id',
        'created_at',
    ];

    // protected $dates = ['deleted_at'];
}
