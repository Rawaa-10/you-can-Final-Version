<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Advs
 *
 * @package App\Models
 * @property int $id
 * @property string|null $location
 * @property int|null $working_hour
 * @property string|null $s-date
 * @property string|null $e-date
 * @property float|null $cost
 * @property string|null $picture
 * @property string $explaining
 * @property int $advservice_id
 * @property int|null $user_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Advservice|null $Adverservice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $Category
 * @property-read int|null $category_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Advs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advs newQuery()
 * @method static \Illuminate\Database\Query\Builder|Advs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereAdvserviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereEDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereExplaining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereSDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advs whereWorkingHour($value)
 * @method static \Illuminate\Database\Query\Builder|Advs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Advs withoutTrashed()
 */
	class Advs extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Advservice
 *
 * @package App\Models
 * @property int $id
 * @property string $service
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advs[] $adv
 * @property-read int|null $adv_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $category
 * @property-read int|null $category_count
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advservice whereUpdatedAt($value)
 */
	class Advservice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdvserviceCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdvserviceCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvserviceCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvserviceCategory query()
 */
	class AdvserviceCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Category
 *
 * @package App\Models
 * @property int $id
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advs[] $adv
 * @property-read int|null $adv_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $service
 * @property-read int|null $service_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Company
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $picture
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Email[] $email
 * @property-read int|null $email_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phone[] $phone
 * @property-read int|null $phone_count
 * @property-read \App\Models\Type|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Email
 *
 * @package App\Models
 * @property string $email
 * @property int $companie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCompanieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Phone
 *
 * @package App\Models
 * @property string $phone
 * @property int $companie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereCompanieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereUpdatedAt($value)
 */
	class Phone extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $role-name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TypeAccount|null $typeaccount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $company
 * @property-read int|null $company_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TypeAccount
 *
 * @property int $id
 * @property string $type-act
 * @property \App\Models\Role|null $role
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereTypeAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAccount whereUpdatedAt($value)
 */
	class TypeAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @package App\Models
 * @property int $id
 * @property string $f-name
 * @property string $l-name
 * @property string $email
 * @property string $password
 * @property string|null $picture
 * @property string|null $phone
 * @property string|null $education
 * @property string|null $birth-date
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int|null $companie_id
 * @property int|null $type-account_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Advs[] $advs
 * @property-read int|null $advs_count
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTypeAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

