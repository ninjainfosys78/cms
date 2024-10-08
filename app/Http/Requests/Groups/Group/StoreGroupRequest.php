<?php

namespace App\Http\Requests\Groups\Group;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGroupRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'registration_date' => ['required', 'date'],
            'registered_office' => ['required'],
            'monthly_meeting' => ['nullable'],
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
