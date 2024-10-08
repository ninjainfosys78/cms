<?php

namespace App\Models\Enterprises;

use App\Models\Setting\FisicalYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnterprisePerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cooperative_id',
        'fisical_year_id',
        'name',
        'phone',
        'email',
        'designation',
        'position',
    ];

    protected $casts = [
        'fisical_year_id' => 'integer',
        'position' => 'integer',
    ];

    public function enterprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function fisicalYear(): BelongsTo
    {
        return $this->belongsTo(FisicalYear::class);
    }
}

