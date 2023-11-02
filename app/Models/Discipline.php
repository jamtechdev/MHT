<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'photo',
        'display_order',
        'is_stored_system',
        'main_coming_soon_image',
        'video_coming_soon_image',
        'created_at'
    ];

    protected $dates = ['deleted_at'];
}
