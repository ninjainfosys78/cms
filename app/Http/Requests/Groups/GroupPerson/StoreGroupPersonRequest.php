<?php

namespace App\Http\Requests\Groups\GroupPerson;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGroupPersonRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email'],
            'designation' => ['nullable'],
            'position' => ['nullable', 'integer'],
        ];
    }
}
