<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
    use HasFactory, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'subscription_id',
        'price',
        'receipt_url',
        'plan_subscription_id',
        'status',
        'subscription_end_date',
        'dispute_flag',
        'dispute_id',
        'canceled_at',
        'created_at'
    ];

    protected $dates = ['deleted_at'];
}
