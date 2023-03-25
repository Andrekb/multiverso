<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'description' => 'required',
            'price' => 'required|decimal:0,2',
            'headline' => 'required',
            'weight' => 'required|decimal:0,4',
            'height' => 'required|decimal:0,4',
            'width' => 'required|decimal:0,4',
            'lenght' => 'required|decimal:0,4',
        ];
    }

    public function messages(): array
    {
        return [
             'name.required' => 'O nome é obrigatório.',
             'description.required' => 'A descrição é obrigatória.',
             'price.required' => 'O preço é obrigatório.',
             'price.decimal' => 'O valor decimal precisa ser separado por (.) - até 2 casas após a vírgula',
             'headline.required' => 'A chamada é obrigatória.',
             'weight.required' => 'O peso é obrigatório.',
             'weight.decilma' => 'O valor decimal precisa ser separado por (.) - até 4 casas após a vírgula.',
             'height.required' => 'A altura é obrigatória.',
             'height.decilma' => 'A valor decimal precisa ser separado por (.) - até 4 casas após a vírgula.',
             'width.required' => 'A larguar é obrigatória.',
             'width.decilma' => 'A valor decimal precisa ser separado por (.) - até 4 casas após a vírgula.',
             'lenght.required' => 'O comprimento é obrigatório.',
             'lenght.decilma' => 'O valor decimal precisa ser separado por (.) - até 4 casas após a vírgula.',
        ];
    }
}
