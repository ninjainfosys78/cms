<?php

namespace App\Http\Requests\Enterprises\Enterprise;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnterpriseRequest extends FormRequest
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
            'enterprise_type_id' => ['required', Rule::exists('enterprise_types', 'id')->withoutTrashed()],
            'name' => ['required', 'string', 'max:255'],
            'vat_pan' => ['nullable'],
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
