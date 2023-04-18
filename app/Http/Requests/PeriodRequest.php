<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodRequest extends FormRequest
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
            'publication' => 'required|exists:publications,id',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'sale_from' => 'required|date',
            'sale_to' => 'required|date',
            'price' => 'required|numeric',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'publication' => 'Neşir',
            'month' => 'Aý',
            'year' => 'Ýyl',
            'sale_from' => 'Başlanýan senesi',
            'sale_to' => 'Gutarýan senesi',
            'price' => 'Bahasy',
        ];
    }
}
