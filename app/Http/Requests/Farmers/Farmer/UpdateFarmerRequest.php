<?php

namespace App\Http\Requests\Farmers\Farmer;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'gender' => ['required', Rule::in(config('enums.gender'))],
            'relationship_status' => ['required', Rule::in(config('enums.relationship_status'))],
            'spouse_name' => ['nullable'],
            'father_name' => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'citizenship_no' => ['required', Rule::unique('farmers', 'citizenship_no')->withoutTrashed()->ignore($this->farmer)],
            'farmer_id_card_no' => ['nullable', Rule::unique('farmers', 'farmer_id_card_no')->withoutTrashed()->ignore($this->farmer)],
            'national_id_card_no' => ['nullable', Rule::unique('farmers', 'national_id_card_no')->withoutTrashed()->ignore($this->farmer)],
            'phone_no' => ['required', Rule::unique('farmers', 'phone_no')->withoutTrashed()->ignore($this->farmer)],
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
