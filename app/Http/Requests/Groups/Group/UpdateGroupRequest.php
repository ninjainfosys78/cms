<?php

namespace App\Http\Requests\Groups\Group;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
            'province_id' => ['nullab;e', Rule::exists('provinces', 'id')],
            'district_id' => ['nullab;e', Rule::exists('districts', 'id')],
            'local_body_id' => ['nullab;e', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['nullab;e', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
