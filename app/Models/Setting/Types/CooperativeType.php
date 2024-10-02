<?php

namespace App\Models\Setting\Types;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CooperativeType extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
    ];
}
