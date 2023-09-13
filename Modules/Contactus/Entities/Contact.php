<?php

namespace Modules\Contactus\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'question_regarding',
        'question_file',
    ];
}
