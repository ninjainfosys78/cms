<?php

namespace App\Models\Cooperatives;

use App\Models\Setting\fisicalYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CooperativePerson extends Model
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

    public function cooperative(): BelongsTo
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function fisicalYear(): BelongsTo
    {
        return $this->belongsTo(fisicalYear::class);
    }
}
