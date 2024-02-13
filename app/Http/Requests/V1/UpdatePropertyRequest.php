<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'title' => ['required', 'string'],
                'address' => ['required', 'string'],
                'price' => ['required', 'numeric'],
                'bedrooms' => ['required', 'integer'],
                'bathrooms' => ['required', 'integer'],
                'type' => ['required', Rule::in(['A', 'V', 'a', 'v'])],
                'status'  => ['required', Rule::in(['A', 'S', 'a', 's'])],            
            ];
        } else {
            return [
                'title' => ['sometimes', 'required', 'string'],
                'address' => ['sometimes', 'required', 'string'],
                'price' => ['sometimes', 'required', 'numeric'],
                'bedrooms' => ['sometimes', 'required', 'integer'],
                'bathrooms' => ['sometimes', 'required', 'integer'],
                'type' => ['sometimes', 'required', Rule::in(['A', 'V', 'a', 'v'])],
                'status'  => ['sometimes', 'required', Rule::in(['A', 'S', 'a', 's'])],
            ];
        };
    }
}
