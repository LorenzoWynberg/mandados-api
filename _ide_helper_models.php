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
 * @property array $name
 * @method string getTranslation(string $field, string $locale, bool $fallback = true)
 * @property int $id
 * @property string $code
 * @property array<array-key, mixed>|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CatalogElement> $elements
 * @property-read int|null $elements_count
 * @property-read mixed $translations
 * @method static \Database\Factories\CatalogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\Catalog withoutTrashed()
 */
	class Catalog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property array $name
 * @method string getTranslation(string $field, string $locale, bool $fallback = true)
 * @property int $id
 * @property int $catalog_id
 * @property string $code
 * @property array<array-key, mixed>|null $description
 * @property int|null $order
 * @property array<array-key, mixed>|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Catalog $catalog
 * @property-read mixed $translations
 * @method static \Database\Factories\CatalogElementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\CatalogElement withoutTrashed()
 */
	class CatalogElement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property User $user
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
 * @method static \Database\Factories\DriverProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereLicensePhotoBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereLicensePhotoFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereLicensePlateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\DriverProfile withoutTrashed()
 */
	class DriverProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property User $user
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
 * @method static \Database\Factories\HotelProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereHotelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\HotelProfile withoutTrashed()
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
 * @property string $lang_code
 * @property int|null $sex_id
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
 * @property-read \App\Models\CatalogElement|null $sex
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereLangCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\App\Models\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

