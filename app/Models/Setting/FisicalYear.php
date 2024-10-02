<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FisicalYear extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [
        'year',
    ];

}
