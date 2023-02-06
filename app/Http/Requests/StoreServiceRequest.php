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
            'name' => 'required|unique:services|min:3|max:100',
            'image' => 'nullable'
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'The name is required',
            'name.unique' => 'This name already exists',
            'name.min' => 'The name is too short',
            'name.max' => 'The name is too long, max :max characters'
        ];
    }
}