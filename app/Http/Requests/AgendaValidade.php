<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgendaValidade extends FormRequest
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
            'descricao' => 'required',
            'inicio' => 'required|date_format:"Y-m-d H:i:s"',
            'fim' => 'required|date_format:"Y-m-d H:i:s"',
            'situacao' => [
                'required',
                Rule::in(['Aceito', 'Pendente', 'Negado']),
            ],
        ];
    }
}
