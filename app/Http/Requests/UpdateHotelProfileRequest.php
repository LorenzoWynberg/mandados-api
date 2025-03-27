<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\HotelProfile;

class UpdateHotelProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $hotelProfile = HotelProfile::find($this->route('hotel_profile'));
        return $hotelProfile && $this->user()->can('update', $hotelProfile);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,'.$this->route('hotel_profile')->id,
            'password' => 'sometimes|required|string|min:6',
            'phone' => 'sometimes|required|string',
            'avatar' => 'sometimes|required|url',
            'sex_id' => 'sometimes|required|in:male,female,unspecified',
            'hotel_name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:255',
            'province' => 'sometimes|required|string|max:255',
            'country' => 'sometimes|required|string|max:255',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
        ];
    }
}
