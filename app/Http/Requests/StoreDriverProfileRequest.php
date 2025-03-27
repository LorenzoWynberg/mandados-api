<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string',
            'avatar' => 'required|url',
            'sex' => 'required|in:male,female,unspecified',
            'license_number' => [
                'required',
                'string',
                'regex:/^(\d-?\d{4}-?\d{4}|\d{12})$/',
            ],
            'license_plate_number' => [
                'required',
                'string',
                'regex:/^[A-Z0-9]{3}-\d{3}$/i',
            ],
            'license_photo_front' => 'required|url',
            'license_photo_back' => 'required|url',
            'date_of_birth' => 'required|date|before:today',
        ];
    }
}
