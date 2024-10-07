<?php

namespace App\Models\Groups;

use App\Models\Setting\fisicalYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupPerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'group_id',
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

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function fisicalYear(): BelongsTo
    {
        return $this->belongsTo(fisicalYear::class);
    }
}
