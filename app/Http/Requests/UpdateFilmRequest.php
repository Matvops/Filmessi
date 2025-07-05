<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFilmRequest extends FormRequest
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
            'id' => ['required'],
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:20', 'max:200'],
            'link' => ['nullable'],
            'year' => ['required'],
            'image' => ['nullable', 'file', 'extensions:jpg,png,jpeg'],
            'active' => ['required'],
            'translated' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'erro',
            'title.required' => 'obrigatório',
            'category.required' => 'obrigatório',
            'description.required' => 'obrigatório',
            'description.min' => 'Mínimo :min',
            'description.max' => 'Máximo :max',
            'year.required' => 'obrigatório',
            'image.file' => 'A capa deve ser um arquivo',
            'image.extensions' => 'Arquivos permitidos *png *jpg *jpeg',
            'active.required' => 'obrigatório',
            'translated.required' => 'obrigatório',
        ];
    }
}
