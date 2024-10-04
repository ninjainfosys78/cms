<?php

namespace App\Models\Address;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
>>>>>>> b0df557ec81e18cbacac950e08a057c9bd908953

class Province extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'province',
        'province_en',
        'code',
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function localBodies(): HasManyThrough
    {
        return $this->hasManyThrough(LocalBody::class, District::class);
    }
}
