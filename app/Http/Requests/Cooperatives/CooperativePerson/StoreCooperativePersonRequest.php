<?php

namespace App\Http\Requests\Cooperatives\CooperativePerson;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCooperativePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
