<?php

namespace App\Models\Cooperatives;

use App\Models\Setting\FisicalYear;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperatives\Cooperative;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CooperativePerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cooperative_id',
        'fisical_year_id',
        'name',
        'phone',
        'email',
        'designation',
        'position',
    ];

    public function cooperative(): BelongsTo
    {
        return $this->belongsTo(Cooperative::class);
    }

    public function fisicalYear(): BelongsTo
    {
        return $this->belongsTo(FisicalYear::class);
    }
}
