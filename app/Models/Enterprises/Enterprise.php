<?php

namespace App\Models\Enterprises;

use App\Models\User;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalBody;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\Types\EnterpriseType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Enterprise extends Model
{
    use HasFactory, SoftDeletes;
    // QueryFilterTrait, GetAllColumns;

    protected $fillable = [
        'unique_id',
        'enterprise_type_id',
        'name',
        'vat_pan',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'village',
        'tole',
        'user_id',
    ];

    protected $casts = [
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

        if (! empty($param['search'])) {
            $key = '%'.trim($param['search']).'%';
            $query->where('unique_id', 'like', $key)
                ->orWhere('name', 'like', $key);
        }

        return $query;
    }

    public function enterpriseType(): BelongsTo
    {
        return $this->belongsTo(EnterpriseType::class);
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

    public function enterprisePersons(): HasMany
    {
        return $this->hasMany(EnterprisePerson::class)->orderBy('position');
    }

    // public function farmers(): BelongsToMany
    // {
    //     return $this->belongsToMany(Farmer::class);
    // }

    // public function grantDetails(): MorphMany
    // {
    //     return $this->morphMany(GrantDetail::class, 'model');
    // }
}

