<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrderRequest extends FormRequest
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
            'offer_id' => 'required|integer|exists:offers,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'vendors' => 'required|array|exists:vendors,id',
            'license_count' => 'nullable|integer',
            'description' => 'nullable|string',
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
            'offer_id' => ['description' => 'The offer of the Order'],
            'customer_id' => ['description' => 'The customer of the Order'],
            'vendors' => ['description' => 'The vendors of the Order'],
            'license_count' => ['description' => 'The license count of the Order'],
            'description' => ['description' => 'The description of the Order'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    }
}
