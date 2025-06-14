<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'fields.available' => 'required|array|min:1',
            'fields.main' => 'required|array|min:1|max:3',
            'level' => 'required|integer|exists:difficulties,id',
            'fields.available.*' => 'integer|exists:activities,id',
            'fields.main.*' => 'integer|exists:activities,id',
        ];
    }
}
