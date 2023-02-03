<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSponsorRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'time' => 'required|max:100',
            'price' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Per favore inserire un nome',
            'name.min' => 'Il nome deve essere lungo almeno 5 caratteri.',
            'name.max' => 'Il nome non può superare i 100 caratteri.',
            'time.required' => 'Per favore inserire una durata',
            'time.max' => 'La cifra non può superare i 100 caratteri.',
            'price.required' => 'Per favore inserire un prezzo',
            'price.max' => 'La cifra non può superare i 100 caratteri.',
        ];
    }
}