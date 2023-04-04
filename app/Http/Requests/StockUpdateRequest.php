<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockUpdateRequest extends FormRequest
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
            'stock' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return [
             'stock.required' => 'O estoque é obrigatório',
             'stock.integer' => 'O número precisa ser inteiro',
             'stock.min' => 'O número mínimo é 0',
        ];
    }
}
