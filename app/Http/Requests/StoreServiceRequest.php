<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'title' => 'required|unique:services|min:3|max:100',
            'img' => 'nullable'
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'The title is required',
            'title.unique' => 'This title already exists',
            'title.min' => 'The title is too short',
            'title.max' => 'The title is too long, max :max characters'
        ];
    }
}