<?php

namespace App\Http\Requests\Grants\GrantDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGrantDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grant_id' => ['nullable', Rule::exists('grants', 'id')->withoutTrashed()],
            'model_type' => ['nullable', Rule::in(config('enums.model_types'))],
            'model_id' => ['nullable', 'integer'],
            'personal_investment' => ['nullable', 'numeric'],
            'is_old' => ['nullable', 'boolean'],
            'prev_fiscal_year_id' => ['nullable', Rule::exists('fiscal_years', 'id')->withoutTrashed()],
            'investment_amount' => ['nullable', 'numeric'],
            'remarks' => ['nullable'],
            'address.province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'address.district_id' => ['nullable', Rule::exists('districts', 'id')],
            'address.local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'address.ward_no' => ['nullable', 'integer'],
            'address.village' => ['nullable'],
            'address.tole' => ['nullable'],
            'kitta_no' => ['nullable'],
            'contact_person' => ['nullable'],
            'contact' => ['nullable'],
        ];
    }
}
