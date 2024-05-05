<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'siren' => 'required|unique:customers,siren,' . $this->id . ',id',
            'siret' => 'required|unique:customers,siret,' . $this->id . ',id',
            'legalName' => 'required',
        ];
    }

    /**
     * Get the body parameters that apply to the request.
     *
     * @return array
     */
    public function bodyParameters(): array
    {
        return [
            'siren' => ['description' => 'The siren of the customer'],
            'siret' => ['description' => 'The siret of the customer'],
            'legal_name' => ['description' => 'The legal name of the customer'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'legal_name' => $this->legalName
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    }
}
