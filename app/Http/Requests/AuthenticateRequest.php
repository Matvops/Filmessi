<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
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
            "email" => ["required", "email"],
            "password" => ["required", "min:8", "max:32", "regex:^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$"],
            "accept_term" => ["required", "in:true"]
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "obrigatório",
            "email.email" => "Email inválido",
            "password.required" => "obrigatório",
            "password.min" => "Senha inválida",
            "password.max" => "Senha inválida",
            "password.regex" => "A senha deve conter pelo menos um caractere e um dígito",
        ];
    }
}
