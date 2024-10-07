<?php

namespace App\Models\Cooperatives;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Farmers\Farmer;
use App\Models\Grants\GrantDetail;
use App\Models\Setting\Type\Affiliation;
use App\Models\Setting\Type\CooperativeType;
use App\Models\User;
use App\Traits\GetAllColumns;
use App\Traits\QueryFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperative extends Model
{
    use HasFactory, SoftDeletes, QueryFilterTrait,GetAllColumns;

    protected $dates = [
        'registration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_id',
        'name',
        'cooperative_type_id',
        'registration_no',
        'registration_date',
        'vat_pan',
        'objective',
        'affiliation_id',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'village',
        'tole',
        'user_id',
    ];

    protected $casts = [
        'cooperative_type_id' => 'integer',
        'affiliation_id' => 'integer',
        'province_id' => 'integer',
        'district_id' => 'integer',
        'local_body_id' => 'integer',
        'ward_no' => 'integer',
    ];

    public function scopeFilter($query, $param = [])
    {
        //filter by user role
        $this->filterByUserRole($query, $param);

        //filter by address
        $this->filterByAddress($query, $param);

        if (!empty($param['cooperative_type_id'])) {
            if (is_array($param['cooperative_type_id'])) {
                $query->whereIn('cooperative_type_id', $param['cooperative_type_id']);
            } else {
                $query->where('cooperative_type_id', $param['cooperative_type_id']);
            }
        }

        if (!empty($param['search'])) {
            $key = '%' . trim($param['search']) . '%';
            $query->where('unique_id', 'like', $key)
                ->orWhere('name', 'like', $key);
        }

        return $query;
    }

    public function cooperativeType(): BelongsTo
    {
        return $this->belongsTo(CooperativeType::class);
    }

    public function affiliation(): BelongsTo
    {
        return $this->belongsTo(Affiliation::class);
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cooperativePersons(): HasMany
    {
        return $this->hasMany(CooperativePerson::class);
    }

    public function farmers(): BelongsToMany
    {
        return $this->belongsToMany(Farmer::class);
    }

    public function grantDetails(): MorphMany
    {
        return $this->morphMany(GrantDetail::class, 'model');
    }
}
