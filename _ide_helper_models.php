<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * App\Models\Admin\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $is_super
 * @property string|null $remember_token
 * @property string $last_ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\GarryWallet
 *
 * @property int $id
 * @property string|null $transaction_desc
 * @property string $type
 * @property string $amount
 * @property string $open_balance
 * @property string $close_balance
 * @property int $profit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereCloseBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereOpenBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereProfitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereTransactionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GarryWallet whereUpdatedAt($value)
 */
	class GarryWallet extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\CanceledOffer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CanceledOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanceledOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanceledOffer query()
 */
	class CanceledOffer extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\City
 *
 * @method static create(array $array)
 * @property int $id
 * @property array $name
 * @property array|null $description
 * @property string|null $iso
 * @property int $state_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Country
 *
 * @method static create(array $array)
 * @method static first()
 * @property int $id
 * @property array $name
 * @property array|null $description
 * @property string $currency
 * @property string $currency_code
 * @property string $iso
 * @property int $un_code
 * @property string|null $flag
 * @property string $tax_percentage
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUnCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Job
 *
 * @method static whereIn(string $string, \Illuminate\Support\Collection $collection)
 * @property int $id
 * @property array $name
 * @property array $description
 * @property string $type
 * @property int|null $parent_job
 * @property int $required_cert
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read Job|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Worker\Worker[] $workers
 * @property-read int|null $workers_count
 * @method static \Database\Factories\Common\JobFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereParentJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRequiredCert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Profit
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_issue_id
 * @property int $worker_offer_id
 * @property int $worker_id
 * @property string $worker_profit_percent
 * @property string $worker_profit_amount
 * @property string $garry_profit_percent
 * @property string $garry_profit_amount
 * @property string|null $garry_tax_amount
 * @property string|null $garry_profit_amount_after_tax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Profit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereGarryProfitAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereGarryProfitAmountAfterTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereGarryProfitPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereGarryTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereUserIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereWorkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereWorkerOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereWorkerProfitAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profit whereWorkerProfitPercent($value)
 */
	class Profit extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\RejectedIssue
 *
 * @property int $id
 * @property int $worker_id
 * @property int $user_id
 * @property int $user_issue_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue query()
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereUserIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RejectedIssue whereWorkerId($value)
 */
	class RejectedIssue extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\State
 *
 * @method static create(array $array)
 * @method static first()
 * @property int $id
 * @property array $name
 * @property array|null $description
 * @property string|null $iso
 * @property int $country_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\IssueFile
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_issue_id
 * @property string $type
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueFile whereUserIssueId($value)
 */
	class IssueFile extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\User
 *
 * @method static create(array $validatedData)
 * @method static find(int $id)
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $balance
 * @property string|null $rate
 * @property int $country_id
 * @property int $state_id
 * @property int $city_id
 * @property string $last_ip
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserAddress[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Common\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Common\Country $country
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Common\State $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $street_name
 * @property string $type
 * @property string $building_name
 * @property string|null $floor_no
 * @property string|null $building_no
 * @property string|null $office_name
 * @property string|null $details
 * @property string $postal_code
 * @property int $phone_code
 * @property int $phone
 * @property int $primary
 * @property int $country_id
 * @property int|null $state_id
 * @property int $city_id
 * @property string $lat
 * @property string $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereBuildingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereBuildingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereFloorNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereOfficeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress wherePrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereStreetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAddress whereUserId($value)
 */
	class UserAddress extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserDevice
 *
 * @method static create(array $array)
 * @method static where(array[] $array)
 * @method static updateOrCreate(array $attributes, array $values = array())
 * @property int $id
 * @property string $unique_id
 * @property int|null $user_id
 * @property string|null $platform
 * @property string|null $app_version
 * @property string|null $loggedin_at
 * @property string|null $loggedout_at
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereLoggedinAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereLoggedoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUserId($value)
 */
	class UserDevice extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserIssue
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_address_id
 * @property string $name
 * @property string $description
 * @property string $time
 * @property string $status
 * @property string $more_info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereMoreInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereUserAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserIssue whereUserId($value)
 */
	class UserIssue extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserRate
 *
 * @property int $id
 * @property int $worker_offer_id
 * @property int $worker_id
 * @property int $user_id
 * @property int $rate
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereWorkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRate whereWorkerOfferId($value)
 */
	class UserRate extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserWallet
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $transaction_desc
 * @property string $type
 * @property string $amount
 * @property string $open_balance
 * @property string $close_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereCloseBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereOpenBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereTransactionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUserId($value)
 */
	class UserWallet extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\Worker
 *
 * @method static find(int $id)
 * @method static create(array $validatedData)
 * @method static where(string|array $string, $email = '')
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $balance
 * @property string|null $rate
 * @property string $photo
 * @property string|null $driver_license
 * @property string|null $driver_license_photo
 * @property string|null $ssn
 * @property string|null $ssn_photo
 * @property int $country_id
 * @property int $state_id
 * @property int $city_id
 * @property string $last_ip
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Common\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Common\Country $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Common\State $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereDriverLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereDriverLicensePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereSsnPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereUpdatedAt($value)
 */
	class Worker extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerDevice
 *
 * @method static create(array $array)
 * @method static where(array[] $array)
 * @method static updateOrCreate(array $attributes, array $values = array())
 * @property int $id
 * @property string $unique_id
 * @property int|null $worker_id
 * @property string|null $platform
 * @property string|null $app_version
 * @property string|null $loggedin_at
 * @property string|null $loggedout_at
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereAppVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereLoggedinAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereLoggedoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerDevice whereWorkerId($value)
 */
	class WorkerDevice extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerFiles
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerFiles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerFiles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerFiles query()
 */
	class WorkerFiles extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerJob
 *
 * @method static insert(array $worker_jobs)
 * @property int $id
 * @property int $job_id
 * @property int $worker_id
 * @property string|null $certificate
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerJob whereWorkerId($value)
 */
	class WorkerJob extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerOffer
 *
 * @property int $id
 * @property int $worker_id
 * @property int $user_id
 * @property int $user_issue_id
 * @property int $job_id
 * @property string $price
 * @property string|null $description
 * @property string|null $user_accepted
 * @property string|null $start_at
 * @property string|null $end_at
 * @property string|null $start_pic
 * @property string|null $end_pic
 * @property string $status
 * @property string $payment_status
 * @property string $payment_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereEndPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereStartPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereUserAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereUserIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerOffer whereWorkerId($value)
 */
	class WorkerOffer extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerRate
 *
 * @property int $id
 * @property int $worker_offer_id
 * @property int $worker_id
 * @property int $user_id
 * @property int $rate
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereWorkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerRate whereWorkerOfferId($value)
 */
	class WorkerRate extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerSchedule
 *
 * @property int $id
 * @property int $worker_id
 * @property string $from
 * @property string $to
 * @property string $day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerSchedule whereWorkerId($value)
 */
	class WorkerSchedule extends \Eloquent {}
}

namespace App\Models\Worker{
/**
 * App\Models\Worker\WorkerWallet
 *
 * @property int $id
 * @property int $worker_id
 * @property string|null $transaction_desc
 * @property string $type
 * @property string $amount
 * @property string $open_balance
 * @property string $close_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereCloseBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereOpenBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereTransactionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkerWallet whereWorkerId($value)
 */
	class WorkerWallet extends \Eloquent {}
}

