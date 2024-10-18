<?php

namespace App\Http\Requests\Cooperatives\CooperativePerson;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCooperativePersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cooperative_id'=>['required',Rule::exists('cooperative_types','id')->withoutTrashed()],
            'fisical_year_id' => ['required', Rule::exists('fisical_years', 'id')->withoutTrashed()],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email'],
            'designation' => ['nullable'],
            'position' => ['nullable', 'integer'],
        ];
    }
}
