<?php

namespace App\Models\Farmers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmerCooperatives extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'unique_id',
        'name',
        'registration_no',
        'vat_pan',
    ];
}
