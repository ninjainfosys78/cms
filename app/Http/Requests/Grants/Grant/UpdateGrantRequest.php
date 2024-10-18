<?php

namespace App\Http\Requests\Grants\Grant;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGrantRequest extends FormRequest
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
            'fisical_year_id' => ['nullable', Rule::exists('fisical_years', 'id')->withoutTrashed()],
            'grant_type_id' => ['nullable', Rule::exists('grant_types', 'id')->withoutTrashed()],
            'grant_office_id' => ['nullable', Rule::exists('grant_offices', 'id')->withoutTrashed()],
            'grant_program_id' => ['nullable', Rule::exists('grant_programs', 'id')->withoutTrashed()],
            'grant_amount' => ['nullable', 'numeric'],
            'grant_for' => ['nullable'],
            'other' => ['nullable'],
            'main_activity' => ['nullable'],
            'remarks' => ['nullable'],
        ];
    }
}
