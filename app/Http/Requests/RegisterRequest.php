<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'phone' => 'required|numeric|between:60999999,65999999',
            'password' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ady',
            'surname' => 'Familiýasy',
            'phone' => 'Telefon belgisi',
            'password' => 'Gizlin belgisi'
        ];
    }
}
