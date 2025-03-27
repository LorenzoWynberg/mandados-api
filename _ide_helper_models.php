<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CatalogElement> $elements
 * @property-read int|null $elements_count
 * @property-read mixed $translations
 * @method static \Database\Factories\CatalogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catalog withoutTrashed()
 * @mixin \Eloquent
 */
	class Catalog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Catalog|null $catalog
 * @property-read mixed $translations
 * @method static \Database\Factories\CatalogElementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatalogElement withoutTrashed()
 * @mixin \Eloquent
 */
	class CatalogElement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $license_number
 * @property string $license_plate_number
 * @property string $license_photo_front
 * @property string $license_photo_back
 * @property string $date_of_birth
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DriverProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereLicensePhotoBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereLicensePhotoFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereLicensePlateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverProfile withoutTrashed()
 * @mixin \Eloquent
 */
	class DriverProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $hotel_name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $province
 * @property string $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\HotelProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereHotelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HotelProfile withoutTrashed()
 * @mixin \Eloquent
 */
	class HotelProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string $avatar
 * @property \App\Models\CatalogElement|null $sex
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DriverProfile|null $driverProfile
 * @property-read \App\Models\HotelProfile|null $hotelProfile
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

