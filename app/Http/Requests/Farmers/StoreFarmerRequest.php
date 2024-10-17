<?php

namespace App\Http\Requests\Farmers;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFarmerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'gender' => ['required'],
            'relationship_status' => ['required'],
            'spouse_name' => ['nullable'],
            'father_name' => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'citizenship_no' => ['required', Rule::unique('farmers', 'citizenship_no')->withoutTrashed()],
            'farmer_id_card_no' => ['nullable', Rule::unique('farmers', 'farmer_id_card_no')->withoutTrashed()],
            'national_id_card_no' => ['nullable', Rule::unique('farmers', 'national_id_card_no')->withoutTrashed()],
            'phone_no' => ['required', Rule::unique('farmers', 'phone_no')->withoutTrashed()],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'groups' => ['nullable', 'array'],
            'groups.*' => [Rule::exists('groups', 'id')->withoutTrashed()],
            // 'enterprises' => ['nullable', 'array'],
            // 'enterprises.*' => [Rule::exists('enterprises', 'id')->withoutTrashed()],
            // 'cooperatives' => ['nullable', 'array'],
            // 'cooperatives.*' => [Rule::exists('cooperatives', 'id')->withoutTrashed()],
        ];
    }
}
