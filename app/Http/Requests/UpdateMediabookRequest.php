<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediabookRequest extends FormRequest
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

            'media' => 'nullable',
            'apartament_id' => 'required|exists:appartaments,id',
            'is_cover' => 'nullable'
        ];
    }

    public function message()
    {
        return [
            'apartament_id' => 'The appartament is required'
        ];
    }
}