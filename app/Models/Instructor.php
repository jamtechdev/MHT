<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable
{
    use HasFactory;

    protected $guard_name = 'instructor';

    protected $guarded = ['id'];

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'school_name',
        'certificate',
        'photo',
        'banner',
        'is_approved',
        'native_language',
        'teaching_experience',
        'google_id',
        'facebook_id',
        'wistia_project_id',
        'created_at',
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    protected $hidden = [
        'password',
    ];
}
