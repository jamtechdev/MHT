<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ClassesVideos extends Model
{
    use HasFactory,SoftDeletes;
    
    public $fillable = [
        'instructor_id',
        'video_id',
        'created_at',
    ];

    protected $dates = ['deleted_at'];
}
