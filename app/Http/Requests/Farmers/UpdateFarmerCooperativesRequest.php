<?php

namespace App\Http\Requests\Farmers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerCooperativesRequest extends FormRequest
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
            'unique_id'=>['nullable','string'],
            'name'=>['nullable','string'],
            'registration_no'=>['nullable','string'],
            'vat_pan'=>['nullable','string'],
        ];
    }
}
