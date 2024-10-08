<?php

namespace App\Http\Requests\Api\V1\Cooperatives\Cooperative;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCooperativeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('cooperative_create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cooperative_type_id' => ['required', Rule::exists('cooperative_types', 'id')->withoutTrashed()],
            'registration_no' => ['required', Rule::unique('cooperatives', 'registration_no')->withoutTrashed()],
            'registration_date' => ['required', 'date'],
            'vat_pan' => ['nullable'],
            'objective' => ['required'],
            'affiliation_id' => ['required', Rule::exists('affiliations', 'id')->withoutTrashed()],
            'address.province_id' => ['required', Rule::exists('provinces', 'id')],
            'address.district_id' => ['required', Rule::exists('districts', 'id')],
            'address.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'address.ward_no' => ['required', 'integer'],
            'address.village' => ['nullable'],
            'address.tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
