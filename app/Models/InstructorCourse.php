<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    public $fillable = [
        'instructor_id',
        'course_category_id',
        'discipline_id',
        'name',
        'description',
        'created_at',
    ];
}