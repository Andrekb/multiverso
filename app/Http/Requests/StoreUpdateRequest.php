<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
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
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'city_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da loja é obrigatório.',
            'address.required' => 'O endereço da loja é obrigatório.',
            'lat.required' => 'A latitude da loja é obrigatória.',
            'long.required' => 'A longitude da loja é obrigatória.',
            'city_id.required' => 'A cidade em qual a loja pertence é obrigatória.',
        ];
    }
}
