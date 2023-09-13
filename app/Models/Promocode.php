<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory, softDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "new_promocodes";

    protected $fillable = [
        'promocode',
        'value',
        'price_type',
        'promocode_id',
        'redeem_count',
        'created_at'
    ];

    protected $dates = ['deleted_at'];
}
