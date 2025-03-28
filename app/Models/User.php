<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'avatar',
        'remember_token',
        'sex_id',
        'lang_code',
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

    public function sex(): BelongsTo
    {
        return $this->belongsTo(CatalogElement::class, 'sex_id');
    }

    public function driverProfile(): HasOne
    {
        return $this->hasOne(DriverProfile::class);
    }

    public function hotelProfile(): HasOne
    {
        return $this->hasOne(HotelProfile::class);
    }

    /**
     * Create a new user as a driver along with its associated driver profile.
     *
     * @param  array  $data  Validated data from the request.
     * @return static
     */
    public static function createAsDriver(array $data): self
    {
        /** @var User $user */
        $user = self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'avatar' => $data['avatar'],
            'sex_id' => $data['sex_id'],
        ]);

        $user->assignRole('driver');

        DriverProfile::create([
            'user_id' => $user->id,
            'license_number' => $data['license_number'],
            'license_plate_number' => $data['license_plate_number'],
            'license_photo_front' => $data['license_photo_front'],
            'license_photo_back' => $data['license_photo_back'],
            'date_of_birth' => $data['date_of_birth'],
        ]);

        return $user;
    }

    /**
     * Create a new user as a hotel along with its associated hotel profile.
     *
     * @param  array  $data  Validated data from the request.
     * @return static
     */
    public static function createAsHotel(array $data): self
    {
        /** @var User $user */
        $user = self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'avatar' => $data['avatar'],
            'sex_id' => $data['sex_id'],
        ]);

        $user->assignRole('hotel');

        HotelProfile::create([
            'user_id' => $user->id,
            'hotel_name' => $data['hotel_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'province' => $data['province'],
            'country' => $data['country'] ?? 'Costa Rica',
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);

        return $user;
    }
}
