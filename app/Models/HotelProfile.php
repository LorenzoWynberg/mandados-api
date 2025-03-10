<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'hotel_name',
        'address',
        'city',
        'province',
        'country',
        'latitude',
        'longitude',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Update the hotel profile along with its associated user.
    *
    * @param array $data
    * @return $this
    */
    public function updateWithUser(array $data)
    {
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

        $profileData = [];
        if (isset($data['hotel_name'])) $profileData['hotel_name'] = $data['hotel_name'];
        if (isset($data['address'])) $profileData['address'] = $data['address'];
        if (isset($data['city'])) $profileData['city'] = $data['city'];
        if (isset($data['province'])) $profileData['province'] = $data['province'];
        if (isset($data['country'])) $profileData['country'] = $data['country'];
        if (isset($data['latitude'])) $profileData['latitude'] = $data['latitude'];
        if (isset($data['longitude'])) $profileData['longitude'] = $data['longitude'];

        $this->update($profileData);

        return $this;
    }
}
