<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'sex',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function driverProfile()
    {
        return $this->hasOne(DriverProfile::class);
    }

    public function hotelProfile()
    {
        return $this->hasOne(HotelProfile::class);
    }

    /**
     * Create a new user as a driver along with its associated driver profile.
     *
     * @param array $data Validated data from the request.
     * @return static
     */
    public static function createAsDriver(array $data): self
    {
        $user = self::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'phone'    => $data['phone'],
            'avatar'   => $data['avatar'],
            'sex'      => $data['sex'],
        ]);

        DriverProfile::create([
            'user_id'                => $user->id,
            'license_number'         => $data['license_number'],
            'license_plate_number'   => $data['license_plate_number'],
            'license_photo_front'    => $data['license_photo_front'],
            'license_photo_back'     => $data['license_photo_back'],
            'date_of_birth'          => $data['date_of_birth'],
        ]);

        return $user;
    }

    /**
     * Create a new user as a hotel along with its associated hotel profile.
     *
     * @param array $data Validated data from the request.
     * @return static
     */
    public static function createAsHotel(array $data): self
    {
        $user = self::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'phone'    => $data['phone'],
            'avatar'   => $data['avatar'],
            'sex'      => $data['sex'],
        ]);

        HotelProfile::create([
            'user_id'    => $user->id,
            'hotel_name' => $data['hotel_name'],
            'address'    => $data['address'],
            'city'       => $data['city'],
            'province'   => $data['province'],
            'country'    => $data['country'] ?? 'Costa Rica',
            'latitude'   => $data['latitude'],
            'longitude'  => $data['longitude'],
        ]);

        return $user;
    }
}
