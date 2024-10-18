<?php

namespace App\Http\Requests\Cooperatives\Cooperative;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCooperativeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('cooperative_create');
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'cooperative_type_id' => ['nullable', Rule::exists('cooperative_types', 'id')->withoutTrashed()],
            'registration_no' => ['nullable', Rule::unique('cooperatives', 'registration_no')->withoutTrashed()->ignore($this->cooperative)],
            'registration_date' => ['nullable', 'date'],
            'vat_pan' => ['nullable'],
            'objective' => ['nullable'],
            'affiliation_id' => ['nullable', Rule::exists('affiliations', 'id')->withoutTrashed()],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'district_id' => ['nullable', Rule::exists('districts', 'id')],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['nullable', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
