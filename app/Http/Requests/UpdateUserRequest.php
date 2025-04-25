<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'string','max:255'],
            'cpf' => ['required', 'string', 'min:10'],
            'cargo' => ['required', 'integer', 'in:1,2,3'],
            'numero_tel' => ['required','integer', 'min:15'],
            'placa_carro' => ['required', 'string', 'min:7'],
            'data_nascimento' => ['required', 'date'],
            'posto_id_posto' => ['nullable','exists:postos,id_posto'],
        ];

        return $rules;
    }
}
