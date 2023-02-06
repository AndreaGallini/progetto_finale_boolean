<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'img' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Per favore inserire un nome',
            'name.min' => 'Il nome deve essere lungo almeno 3 caratteri',
            'name.max' => 'Il nome non può superare i 100 caratteri',
            'img.required' => "Per favore inserire un'icona",
        ];
    }
}