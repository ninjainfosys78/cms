<?php

namespace App\Http\Requests\Farmers\Farmer;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'gender' => ['nullable'],
            'relationship_status' => ['nullable'],
            'spouse_name' => ['nullable'],
            'father_name' => ['nullable', 'string', 'max:255'],
            'grandfather_name' => ['nullable', 'string', 'max:255'],
            'citizenship_no' => ['nullable', Rule::unique('farmers', 'citizenship_no')->withoutTrashed()->ignore($this->farmer)],
            'farmer_id_card_no' => ['nullable', Rule::unique('farmers', 'farmer_id_card_no')->withoutTrashed()->ignore($this->farmer)],
            'national_id_card_no' => ['nullable', Rule::unique('farmers', 'national_id_card_no')->withoutTrashed()->ignore($this->farmer)],
            'phone_no' => ['nullable', Rule::unique('farmers', 'phone_no')->withoutTrashed()->ignore($this->farmer)],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'district_id' => ['nullable', Rule::exists('districts', 'id')],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['nullable', 'integer'],
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
