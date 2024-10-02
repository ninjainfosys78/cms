<?php

namespace App\Http\Requests\Enterprises\EnterprisePerson;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnterprisePersonRequest extends FormRequest
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
            'enterprise_type_id' => ['nullable', Rule::exists('enterprise_types', 'id')->withoutTrashed()],
            'name' => ['nullable', 'string', 'max:255'],
            'vat_pan' => ['nullable'],
            'address.province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'address.district_id' => ['nullable', Rule::exists('districts', 'id')],
            'address.local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'address.ward_no' => ['nullable', 'integer'],
            'address.village' => ['nullable'],
            'address.tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
