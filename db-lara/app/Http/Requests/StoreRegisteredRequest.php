<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisteredRequest extends FormRequest
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string'],
            'cpf' => ['required', 'string', 'min:10', 'unique:users,cpf'],
            'cargo' => ['required', 'integer', 'in:1,2,3'],
            'numero_tel' => ['required','integer', 'min:15', 'unique:users,numero_tel'],
            'placa_carro' => ['required', 'string', 'min:7', 'unique:users,placa_carro'],
            'data_nascimento' => ['required', 'date'],
            'posto_id_posto' => ['nullable','exists:postos,id_posto'],
        ];

        return $rules;
    }

    public function withValidator($validar)
    {
        $validar->after(function ($validar) {
            $cargo = $this->input('cargo');
            $posto_id_posto = $this->input('posto_id_posto');

            if (($cargo == 2 || $cargo == 3) && empty($posto_id_posto)) {
                $validar->errors()->add('posto_id_posto', 'O usuário ou o administrador deve participar de um posto!');
            }

            if ($cargo == 1 && !empty($posto_id_posto)) {
                $validar->errors()->add('posto_id_posto', 'O administrador de postos não participa de um posto!');
            }
        });
    }
}
