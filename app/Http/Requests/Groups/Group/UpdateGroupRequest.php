<?php

namespace App\Http\Requests\Groups\Group;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupRequest extends FormRequest
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
            'name' => ['nullab;e', 'string', 'max:255'],
            'registration_date' => ['nullab;e', 'date'],
            'registered_office' => ['nullab;e'],
            'monthly_meeting' => ['nullable'],
            'vat_pan' => ['nullable'],
            'address.province_id' => ['nullab;e', Rule::exists('provinces', 'id')],
            'address.district_id' => ['nullab;e', Rule::exists('districts', 'id')],
            'address.local_body_id' => ['nullab;e', Rule::exists('local_bodies', 'id')],
            'address.ward_no' => ['nullab;e', 'integer'],
            'address.village' => ['nullable'],
            'address.tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
