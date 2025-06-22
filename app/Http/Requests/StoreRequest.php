<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'min:6', 'max:16'],
            'password' => ['required', 'min:8', 'max:32', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "obrigatório",
            'username.required' => "obrigatório",
            'password.required' => "obrigatório",
            'password_confirmation.required' => "obrigatório",
            'email.email' => "Email inválido",
            'email.unique' => "Já em uso",
            'username.min' => "minímo de :min caracteres",
            'username.max' => "máximo de :max caracteres",
            'password.min' => "minímo de :min caracteres",
            'password.max' => "máximo de :max caracteres",
            'password.regex' => "A senha deve conter pelo menos um caractere e um dígito",
            'password_confirmation.same' => "As senhas não coincidem",
        ];
    }
}
