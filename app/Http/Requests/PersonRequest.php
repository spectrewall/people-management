<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Contracts\Validation\Validator;
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
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
        $idToIgnore = isset($id) ? ",$id" : '';

        $addressRules = collect(Address::rules())
            ->mapWithKeys(fn ($value, $key) => ["address.$key" => $value])
            ->toArray();

        return array_merge($addressRules, [
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
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return Validator
    */
    protected function getValidatorInstance(): Validator
    {
        $this->merge([
            'phone' => only_numbers($this->input('phone')),
            'cpf' => only_numbers($this->input('cpf'))
        ]);

        return parent::getValidatorInstance();
    }
}
