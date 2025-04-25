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
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cpf' => 'required',
            'numero_tel' => 'required',
            'placa_carro' => 'required',
            'cargo' => 'required',
            'data_nascimento' => 'required|date',
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
