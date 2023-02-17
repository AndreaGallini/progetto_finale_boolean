<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'descrizione' => 'required',
            'room_number' => 'required|max:2',
            'bed_number' => 'required|max:2',
            'bath_number' => 'required|max:2',
            'mq_value' => 'required|max:20',
            'address' => 'required|max:200',
            'lat' => 'required',
            'long' => 'required',
            'price' => 'required',
            'visible' => 'nullable',
            'cover_img' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Per favore inserire un titolo',
            'title.min' => 'Il titolo deve essere lungo almeno 5 caratteri',
            'title.max' => 'Il titolo non può superare i 100 caratteri',
            'descrizione.required' => 'La descrizione è obbligatoria',
            'room_number.required' => 'Per favore inserire il numero di stanze',
            'room_number.max' => 'Il numero non può superare le 2 cifre',
            'bed_number.required' => 'Per favore inserire i posti letto disponibili',
            'bed_number.max' => 'Il numero non può superare le 2 cifre',
            'bath_number.required' => 'Per favore inserire i bagni disponibili',
            'bath_number.max' => 'Il numero non può superare le 2 cifre',
            'mq_value.required' => 'Per favore inserire i metri quadri',
            'mq_value.max' => 'Il numero non può superare le 20 cifre',
            'address.required' => 'Per favore inserire un indirizzo',
            'address.max' => "L'indirizzo non può superare i 200 caratteri",
            'lat.required' => 'Per favore inserire una latitudine',
            'long.required' => 'Per favore inserire una longitudine',
            'price.required' => 'Per favore inserire un prezzo',
            'visible.required' => 'Per favore scegliere sì o no',
            'cover_img.required' => 'Per favore aggiungere una foto',
        ];
    }
}
