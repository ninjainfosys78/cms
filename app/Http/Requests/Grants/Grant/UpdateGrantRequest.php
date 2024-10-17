<?php

namespace App\Http\Requests\Grants\Grant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'fiscal_year_id' => ['nullable', Rule::exists('fiscal_years', 'id')->withoutTrashed()],
            'grant_type_id' => ['nullable', Rule::exists('grant_types', 'id')->withoutTrashed()],
            'grant_office_id' => ['nullable', Rule::exists('grant_offices', 'id')->withoutTrashed()],
            'grant_program_id' => ['nullable', Rule::exists('grant_programs', 'id')->withoutTrashed()],
            'grant_amount' => ['nullable', 'numeric'],
            'grant_for' => ['nullable', Rule::in(config('enums.grant_for'))],
            'other' => ['nullable_if:grant_for,Other'],
            'main_activity' => ['nullable'],
            'remarks' => ['nullable'],
        ];
    }
}
