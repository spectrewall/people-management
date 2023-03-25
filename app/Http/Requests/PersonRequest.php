<?php

namespace App\Http\Requests;

use App\Models\Person;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
        $idToIgnore = isset($id) ? ",$id" : '';

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:2'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                "unique:people,id$idToIgnore"
            ],
            'cpf' => [
                'required',
                'string',
                'size:11',
                "unique:people,id$idToIgnore"
            ],
            'phone' => [
                'nullable',
                'string',
                'max:11',
                'min:10'
            ],
            'birth_date' => [
                'nullable',
                'date_format:Y-m-d',
                'before_or_equal:today'
            ]
        ];
    }
}
