<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
            'title' => ['required', Rule::unique('services')->ignore($this->service), 'min:3', 'max:100'],
            'img' => 'nullable'
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'Il titolo è richiesto',
            'title.unique' => 'Questo titolo è già esistente',
            'title.min' => 'Il titolo è troppo corto, minimo :min caratteri',
            'title.max' => 'Il titolo è troppo lungo, massimo :max caratteri'
        ];
    }
}