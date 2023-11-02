<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class InstructorDiscipline extends Authenticatable
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    public $fillable = [
        'instructor_id',
        'discipline_id'
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    // protected $hidden = [
    //     'password',
    // ];

    public function displayorder(){
        return $this->belongsTo(Instructor::class,'instructor_id','id');
    }
}
