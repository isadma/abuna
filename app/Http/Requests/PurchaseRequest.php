<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            '*.publicationId' => 'required|exists:publications,id',
            '*.name' => 'required|string|max:255',
            '*.surname' => 'nullable|string|max:255',
            '*.quantity' => 'required|numeric',
            '*.streetId' => 'required|exists:addresses,id',
            '*.block' => 'nullable|string|max:255',
            '*.house' => 'nullable|string|max:255',
            '*.home' => 'nullable|string|max:255',
            '*.months' => 'required|array',
            '*.months.*' => 'required|exists:periods,id',
        ];
    }
}
