<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCourseLession extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    public $fillable = [
        'instructor_id',
        'instructor_course_id',
        'title',
        'description',
        'lession_thumbnail',
        'lession_video_path',
        'video_duration',
        'video_name',
        'video_id',
        'created_at',
    ];
}