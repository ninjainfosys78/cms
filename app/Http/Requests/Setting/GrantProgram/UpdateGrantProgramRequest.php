<?php

namespace App\Http\Requests\Setting\GrantProgram;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrantProgramRequest extends FormRequest
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
            'program_name'=>['required','string','min:3']
        ];
    }
}
