<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HomePageBanner extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'banner_id',
        'status',
        'thumbnailUrl',
        'created_at'
    ];
    

    protected $dates = ['deleted_at'];
}
