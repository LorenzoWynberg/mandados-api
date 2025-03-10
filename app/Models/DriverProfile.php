<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'license_number',
        'license_plate_number',
        'license_photo_front',
        'license_photo_back',
        'date_of_birth',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Update the driver profile along with its associated user.
     *
     * @param array $data
     * @return $this
     */
    public function updateWithUser(array $data)
    {
        // Update user fields.
        $userData = [];
        if (isset($data['name'])) $userData['name'] = $data['name'];
        if (isset($data['email'])) $userData['email'] = $data['email'];
        if (isset($data['password'])) $userData['password'] = bcrypt($data['password']);
        if (isset($data['phone'])) $userData['phone'] = $data['phone'];
        if (isset($data['avatar'])) $userData['avatar'] = $data['avatar'];
        if (isset($data['sex'])) $userData['sex'] = $data['sex'];

        if (!empty($userData)) {
            $this->user->update($userData);
        }

        // Update driver profile fields.
        $profileData = [];
        if (isset($data['license_number'])) $profileData['license_number'] = $data['license_number'];
        if (isset($data['license_plate_number'])) $profileData['license_plate_number'] = $data['license_plate_number'];
        if (isset($data['license_photo_front'])) $profileData['license_photo_front'] = $data['license_photo_front'];
        if (isset($data['license_photo_back'])) $profileData['license_photo_back'] = $data['license_photo_back'];
        if (isset($data['date_of_birth'])) $profileData['date_of_birth'] = $data['date_of_birth'];

        $this->update($profileData);

        return $this;
    }
}
