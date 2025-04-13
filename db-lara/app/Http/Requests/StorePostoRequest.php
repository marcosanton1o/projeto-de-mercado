<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'local_cidade' => ['required', 'string', 'max:100'],
            'numero_tel_posto' => ['required', 'string', 'max:30'],
            'local_estado' => ['required', 'string', 'max:45'],
            'cep' => ['required', 'digits:8'],
        ];

        return $rules;
    }
}
