<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DriverProfile;

class UpdateDriverProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $driverProfile = DriverProfile::find($this->route('driver_profile'));

        return $driverProfile && $this->user()->can('update', $driverProfile);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,'.$this->route('driver_profile')->id,
            'password' => 'sometimes|required|string|min:6',
            'phone' => 'sometimes|required|string',
            'avatar' => 'sometimes|required|url',
            'sex' => 'sometimes|required|in:male,female,unspecified',
            'license_number' => [
                'sometimes',
                'required',
                'string',
                'regex:/^(\d-?\d{4}-?\d{4}|\d{12})$/',
            ],
            'license_plate_number' => [
                'sometimes',
                'required',
                'string',
                'regex:/^[A-Z0-9]{3}-\d{3}$/i',
            ],
            'license_photo_front' => 'sometimes|required|url',
            'license_photo_back' => 'sometimes|required|url',
            'date_of_birth' => 'sometimes|required|date|before:today',
        ];
    }
}
