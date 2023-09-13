<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory, softDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'card_number',
        'brand',
        'exp_month',
        'exp_year',
        'type',
        'default_method',
        'created_at'
    ];

    protected $dates = ['deleted_at'];
}
