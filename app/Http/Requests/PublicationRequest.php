<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
            'image' => 'nullable|image',
            'index' => 'required|numeric',
            'name' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'type' => 'required|exists:types,id'
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Suraty',
            'index' => 'Inkdeksi',
            'name' => 'Ady',
            'owner' => 'Esaslandyryjysy',
            'type' => 'Görnüşi'
        ];
    }
}
