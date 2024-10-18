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
            'name' => ['required', 'string', 'max:255'],
            'cooperative_type_id' => ['required', Rule::exists('cooperative_types', 'id')->withoutTrashed()],
            'registration_no' => ['required', Rule::unique('cooperatives', 'registration_no')->withoutTrashed()->ignore($this->cooperative)],
            'registration_date' => ['required', 'date'],
            'vat_pan' => ['nullable'],
            'objective' => ['required'],
            'affiliation_id' => ['required', Rule::exists('affiliations', 'id')->withoutTrashed()],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
