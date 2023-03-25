<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'manager' => 'required',
            'region' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da cidade é obrigatório.',
            'uf.required' => 'O estado é obrigatório.',
            'cep.required' => 'O CEP é obrigatório',
            'manager.required' => 'O responsável é obrigatório.',
            'region.required' => 'A regiao é obrigatória.',
        ];
    }
}
