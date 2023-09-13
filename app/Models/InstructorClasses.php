<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InstructorClasses extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        'instructor_id',
        'class_name',
        'main_category_id',
        'discipline_id',
        'publish',
        'created_at',
    ];

    protected $dates = ['deleted_at'];
}
