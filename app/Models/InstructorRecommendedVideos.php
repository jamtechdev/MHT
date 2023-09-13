<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InstructorRecommendedVideos extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        'instructor_id',
        'title',
        'video_name',
        'video_thumbnail',
        'video_id',
        'video_duration',
        'status',
        'created_at',
    ];

    protected $dates = ['deleted_at'];
}
