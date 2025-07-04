<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFilmRequest extends FormRequest
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
            'title' => ['required', 'unique:films,title'],
            'category' => ['required', Rule::notIn(0)],
            'description' => ['required', 'min:20', 'max:200'],
            'link' => ['nullable'],
            'year' => ['required'],
            'image' => ['required', 'file', 'extensions:jpg,png,jpeg'],
            'active' => ['required'],
            'translated' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'obrigatório',
            'title.unique' => 'Título já existente',
            'category.required' => 'obrigatório',
            'category.not_in' => 'obrigatório',
            'description.required' => 'obrigatório',
            'description.min' => 'Mínimo :min',
            'description.max' => 'Máximo :max',
            'year.required' => 'obrigatório',
            'image.required' => 'obrigatório',
            'image.file' => 'A capa deve ser um arquivo',
            'image.extensions' => 'Arquivos permitidos *png *jpg *jpeg',
            'active.required' => 'obrigatório',
            'translated.required' => 'obrigatório',
        ];
    }
}
