<?php

namespace App\Models\Grants;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Setting\fisicalYear;
use App\Traits\GetAllColumns;
use App\Traits\QueryFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrantDetail extends Model
{
    use HasFactory, SoftDeletes, QueryFilterTrait, GetAllColumns;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'grant_id',
        'model_type',
        'model_id',
        'personal_investment',
        'is_old',
        'prev_fisical_year_id',
        'investment_amount',
        'remarks',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'village',
        'tole',
        'kitta_no',
        'contact',
        'contact_person',
        'user_id'
    ];

    protected $casts = [
        'is_old' => 'boolean',
        'personal_investment' => 'double',
        'prev_fisical_year_id' => 'integer',
        'investment_amount' => 'double',
    ];

    public function scopeFilter($query, $param = [])
    {
        //filter by user role
        $this->filterByUserRole($query, $param);

        if (!empty($param['grant_id'])) {
            if (is_array($param['grant_id'])) {
                $query->whereIn('grant_id', $param['grant_id']);
            } else {
                $query->where('grant_id', $param['grant_id']);
            }
        }

        //filter by address
        $this->filterByAddress($query, $param);

        if (!empty($param['model_type'])) {
            if (is_array($param['model_type'])) {
                $modelTypes = [];
                foreach ($param['model_type'] as $modelType) {
                    $modelTypes[] = config('enums.model_values.' . $modelType);
                }
                $query->whereIn('model_type', $modelTypes);
            } else {
                $query->where('model_type', config('enums.model_values.' . $param['model_type']));
            }
        }
        if (!empty($param['is_old'])) {
            $query->where('is_old', $param['is_old']);
        }

        return $query;
    }

    public function grant(): BelongsTo
    {
        return $this->belongsTo(Grant::class);
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function prevfisicalYear(): BelongsTo
    {
        return $this->belongsTo(fisicalYear::class, 'prev_fisical_year_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function localBody(): BelongsTo
    {
        return $this->belongsTo(LocalBody::class);
    }
}
