<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'branch' => 'required|exists:branches,id',
            'street' => 'required|string|max:255',
            'home' => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [
            'branch' => 'Şahamça',
            'street' => 'Köçe',
            'home' => 'Öý'
        ];
    }
}
