<?php

namespace App\Models\Grants;

use App\Models\User;
use App\Traits\GetAllColumns;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Traits\QueryFilterTrait;
use App\Models\Address\LocalBody;
use App\Models\Setting\fisicalYear;
use App\Models\Setting\GrantOffice;
use App\Models\Setting\GrantProgram;
use App\Models\Setting\Types\GrantType;
<<<<<<< HEAD
=======
use App\Models\Setting\Types\GrantType as TypesGrantType;
use App\Models\User;
use App\Traits\GetAllColumns;
use App\Traits\QueryFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> e94c3edae7393785f04a3ca31b2729df3f802698
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grant extends Model
{
    use HasFactory, SoftDeletes, QueryFilterTrait, GetAllColumns;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'fisical_year_id',
        'grant_type_id',
        'grant_office_id',
        'grant_program_id',
        'grant_amount',
        'grant_for',
        'other',
        'main_activity',
        'remarks',
        'user_id',
    ];

    protected $casts = [
        'fisical_year_id' => 'integer',
        'grant_type_id' => 'integer',
        'grant_amount' => 'double',
        'province_id' => 'integer',
        'district_id' => 'integer',
        'local_body_id' => 'integer',
        'ward_no' => 'integer',
        'grant_office_id' => 'integer',
        'grant_program_id' => 'integer',
    ];

    public function scopeFilter($query, $param = [])
    {
        //filter by user role
        $this->filterByUserRole($query, $param);

        if (!empty($param['grant_type_id'])) {
            if (is_array($param['grant_type_id'])) {
                $query->whereIn('grant_type_id', $param['grant_type_id']);
            } else {
                $query->where('grant_type_id', $param['grant_type_id']);
            }
        }

        if (!empty($param['fisical_year_id'])) {
            if (is_array($param['fisical_year_id'])) {
                $query->whereIn('fisical_year_id', $param['fisical_year_id']);
            } else {
                $query->where('fisical_year_id', $param['fisical_year_id']);
            }
        }

        if (!empty($param['search'])) {
            $key = '%' . trim($param['search']) . '%';
            $query->where('programme_name', 'like', $key);
        }

        return $query;
    }

    public function grantProgram(): BelongsTo
    {
        return $this->belongsTo(GrantProgram::class);
    }

    public function grantOffice(): BelongsTo
    {
        return $this->belongsTo(GrantOffice::class);
    }

    public function fisicalYear(): BelongsTo
    {
        return $this->belongsTo(fisicalYear::class);
    }

    public function grantType(): BelongsTo
    {
        return $this->belongsTo(GrantType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grantDetails(): HasMany
    {
        return $this->hasMany(GrantDetail::class);
    }
}
