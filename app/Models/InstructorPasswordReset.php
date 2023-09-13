<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorPasswordReset extends Model
{
    use HasFactory;

    public $fillable = [
        'email',
        'token',
        'created_at',
    ];
}