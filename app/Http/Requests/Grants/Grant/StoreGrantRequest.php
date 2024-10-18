<?php

namespace App\Http\Requests\Grants\Grant;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGrantRequest extends FormRequest
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
            'fisical_year_id' => ['required', Rule::exists('fisical_years', 'id')->withoutTrashed()],
            'grant_type_id' => ['required', Rule::exists('grant_types', 'id')->withoutTrashed()],
            'grant_office_id' => ['required', Rule::exists('grant_offices', 'id')->withoutTrashed()],
            'grant_program_id' => ['required', Rule::exists('grant_programs', 'id')->withoutTrashed()],
            'grant_amount' => ['required', 'numeric'],
            'grant_for' => ['required', 'string'],
            'other' => ['required_if:grant_for,Other'],
            'main_activity' => ['nullable'],
            'remarks' => ['nullable'],
        ];
    }
}
