<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory, softDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plan_name',
        'price',
        'validity',
        'validity_type',
        'benefits',
        'created_at'
    ];

    protected $dates = ['deleted_at'];
}
