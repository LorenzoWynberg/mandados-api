<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property User $user
 */
class DriverProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'license_number',
        'license_plate_number',
        'license_photo_front',
        'license_photo_back',
        'date_of_birth',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Update the driver profile along with its associated user.
     *
     * @return $this
     */
    public function updateWithUser(array $data): static
    {
        // Update user fields.
        $userData = [];
        if (isset($data['name'])) {
            $userData['name'] = $data['name'];
        }
        if (isset($data['email'])) {
            $userData['email'] = $data['email'];
        }
        if (isset($data['password'])) {
            $userData['password'] = bcrypt($data['password']);
        }
        if (isset($data['phone'])) {
            $userData['phone'] = $data['phone'];
        }
        if (isset($data['avatar'])) {
            $userData['avatar'] = $data['avatar'];
        }
        if (isset($data['sex_id'])) {
            $userData['sex_id'] = $data['sex_id'];
        }

        if (! empty($userData)) {
            $this->user->update($userData);
        }

        // Update driver profile fields.
        $profileData = [];
        if (isset($data['license_number'])) {
            $profileData['license_number'] = $data['license_number'];
        }
        if (isset($data['license_plate_number'])) {
            $profileData['license_plate_number'] = $data['license_plate_number'];
        }
        if (isset($data['license_photo_front'])) {
            $profileData['license_photo_front'] = $data['license_photo_front'];
        }
        if (isset($data['license_photo_back'])) {
            $profileData['license_photo_back'] = $data['license_photo_back'];
        }
        if (isset($data['date_of_birth'])) {
            $profileData['date_of_birth'] = $data['date_of_birth'];
        }

        $this->update($profileData);

        return $this;
    }
}
