<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediabookRequest extends FormRequest
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
            'title' => 'required',
            'apartment_id' => 'required|exists:apartments,id',
            'img' => 'required'
        ];
    }
    public function message()
    {
        return [
            'apartament_id' => "L'appartamento è richiesto"
        ];
    }
}
