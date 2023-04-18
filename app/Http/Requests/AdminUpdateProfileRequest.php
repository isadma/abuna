<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateProfileRequest extends FormRequest
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
            'username' => 'required|string|max:255|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ady',
            'surname' => 'Familiýasy',
            'username' => 'Ulanyjy belgisi',
        ];
    }
}
