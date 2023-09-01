<?php

namespace App\Models;

use App\Helpers\Functions;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Class Company
 * @package App\Models
 * @version July 30, 2020, 11: 23 am -03
 */
class Company extends Model
{
    // use InteractsWithMedia;
    // use HasRelationships;
    use SoftDeletes;

    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'companies';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    public $fillable =
    [
        'holding_id',
        'user_id',
        'name',
        'email',
        'is_active',
        'is_anchor',
        'photo',
        'cover_image',
        'document',
        'phone',
        'description',
        'instagram',
        'facebook',
        'whatsapp',
        'website',
        'zipcode',
        'address',
        'number',
        'neighborhood',
        'city',
        'balance',
        'state',
        'complement',
        'reference',
        'latitude',
        'longitude',
        'company_category_id',
        'auto_accept_sales',
        'pix',
        'accepted_spoten_pay',
        'accepted_membership_terms',
        'payment_link',
        'menu_link',
        'profile_link',
        'accepted_payment_methods_spoten_pay',
        'accepted_payment_methods_checkin_employee',
        'accepted_payment_methods_checkin_customer',
        'slug',
        'email_financial',
        'bank_code',
        'bank_account_type',
        'bank_agency',
        'bank_agency_digit',
        'bank_account',
        'bank_account_digit',
        'accepted_installment_quantity',
        'customer_pay_installment_fees',
        'minimum_value_installment',
        'automatic_recharge_balance',
        'recharge_balance_when',
        'recharge_balance_value' ,
        'recharge_balance_with_card_id',
        'accepted_weekly_performance_report',
        'accepted_monthly_performance_report',
        'working_time',
        'free_shipments',
        'color_primary',
        'color_secondary',
        'color_tertiary',
        'facebook_pixel',
        'privacy_policy_link',
        'terms_of_use_link',
        'app_latest_version_ios',
        'app_latest_version_android',
        'cloud_functions_url',
        'onelink_link',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes =
    [
        'accepted_payment_methods_spoten_pay' => '["credit", "debit", "pix"]',
        'accepted_payment_methods_checkin_employee' => '["credit", "debit", "pix", "money", "others"]',
        'accepted_payment_methods_checkin_customer' => '["credit", "debit", "pix", "money", "others"]',
        'working_time' => '
            [
                {
                    "index": 0,
                    "name": "sunday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 1,
                    "name": "monday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 2,
                    "name": "tuesday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 3,
                    "name": "wednesday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 4,
                    "name": "thursday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 5,
                    "name": "friday",
                    "start": null,
                    "end": null
                }, 
                {
                    "index": 6,
                    "name": "saturday",
                    "start": null,
                    "end": null
                }
            ]
        ',
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts =
    [
        'id'            => 'integer',
        'holding_id'    => 'integer',
        'user_id'    => 'integer',
        'name'          => 'string',
        'email'         => 'string',
        'is_active'     => 'boolean',
        'is_anchor'     => 'boolean',
        'photo'         => 'string',
        'document'      => 'string',
        'phone'         => 'string',
        'description'   => 'string',
        'zipcode'       => 'string',
        'address'       => 'string',
        'number'        => 'string',
        'neighborhood'  => 'string',
        'city'          => 'string',
        'state'         => 'string',
        'complement'    => 'string',
        'reference'     => 'string',
        'latitude'      => 'float',
        'longitude'     => 'float',
        'balance'      => 'float',
        'free_shipments'     => 'integer',
        'instagram'     => 'string',
        'facebook'      => 'string',
        'whatsapp'      => 'string',
        'website'       => 'string',
        'disclose_link' => 'string',
        'menu_link'     => 'string',
        'payment_link'  => 'string',
        'profile_link'                  => 'string',
        'auto_accept_sales' => 'boolean',
        'accepted_spoten_pay' => 'boolean',
        'accepted_membership_terms' => 'boolean',
        'pix'       => 'string',
        'accepted_payment_methods_spoten_pay' => 'array',
        'accepted_payment_methods_checkin_employee' => 'array',
        'accepted_payment_methods_checkin_customer' => 'array',
        'slug' => 'string',
        'email_financial' => 'string',
        'bank_code' => 'string',
        'bank_account_type' => 'string',
        'bank_agency' => 'string',
        'bank_agency_digit' => 'string',
        'bank_account' => 'string',
        'bank_account_digit' => 'string',
        'accepted_installment_quantity' => 'integer',
        'customer_pay_installment_fees' => 'boolean',
        'minimum_value_installment'  => 'integer',
        'automatic_recharge_balance' => 'boolean',
        'recharge_balance_when' => 'float',
        'recharge_balance_value' => 'float',
        'recharge_balance_with_card_id' => 'integer',
        'accepted_weekly_performance_report' => 'boolean',
        'accepted_monthly_performance_report' => 'boolean',
        'working_time' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules =
    [
        //'holding_id'   => 'required',
        'name'         => 'required',
        'document'     => 'required',
        //'company_category_id'  => 'required',
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends =
    [
        /*
        'readable_balance',
        'readable_created_at',
        'readable_updated_at',
        'readable_latitude',
        'readable_longitude',
        'readable_is_active',
        'full_address',
        'disclose_link',
        'disclose_access_count',
        'disclose_register_count',
        'average_rating',
        'current_spoten_fee_configuration',
        'accepted_installment',
        */
    ];

    // =========================================================================
    // Relationships
    // =========================================================================

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function plans()
    {
        return $this->belongsToMany(\App\Models\Plan::class, 'company_plan', 'company_id', 'plan_id')
                    ->orderBy('company_plan.expiration_date', 'desc')
                    ->withPivot(
                        'id',
                        'company_id',
                        'plan_id',

                        'name',
                        'description',
                        'active',

                        'value',
                        'months_duration',
                        'renewable',
                        'automatic_renovation',
                        'additional_value',
                        'card_id',
                        'payment_method',

                        'vouchers',
                        'surveys',
                        'giftcards',
                        'subscriptions',
                        'spoten_pay',
                        'individual_shipments',
                        'scheduling_shipments',

                        'customers',
                        'customers_price',
                        'free_shipments',
                        'employees',

                        'mail_price',
                        'sms_price',
                        'push_price',
                        'whatsapp_price',
                        'spoten_fee_configurations',

                        'expiration_date',
                        'cancellation_date',
                        'recharge_date',
                        'created_at',
                        'updated_at',
                    )
                    ->withTimestamps();
    }

    public function currentPlan()
    {
        return $this->plans()
                    ->wherePivot('active', true)
                    ->wherePivot('expiration_date', '!=', null)
                    ->orderBy('company_plan.id', 'desc')
                    ->first();
    }

    public function scopeWithCurrentPlan($query)
    {
        return $query->whereRaw('(
                                    select 
                                        count(*) 
                                    from 
                                        company_plan 
                                    where 
                                        company_plan.company_id = companies.id
                                        and company_plan.active
                                        and company_plan.expiration_date is not null
                                        and company_plan.expiration_date >= now()
                                ) > 0');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function holding()
    {
        return $this->belongsTo(\App\Models\Holding::class, 'holding_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rosters()
    {
        return $this->hasMany(\App\Models\Roster::class, 'company_id');
    }

    public function revenues()
    {
        /*
        $revenues = $this->payments()
                    ->where('payments.is_accepted', true)
                    ->where('payments.status_payment_id', 2)
                    ->where('payments.balance', false)
                    ->whereNull('payments.plan_id');
        */

        $revenues = \DB::table('payments')
                        ->select(
                            'payments.*',

                            \DB::raw(
                                '(
                                    (select if (count(vouchers.total_value) > 0, sum(vouchers.total_value), 0) from vouchers where vouchers.id = payments.used_voucher_id)
                                    + (select if (count(payment_with_subscription.discount) > 0, sum(payment_with_subscription.discount), 0) from payment_with_subscription where payment_with_subscription.payment_id = payments.id)
                                ) as discount_value'
                            ),

                            \DB::raw(
                                '(
                                    if
                                    (
                                        (
                                            payments.value
                                            - (select discount_value)
                                        ) > 0,
                                        (
                                            payments.value
                                            - (select discount_value)
                                        ),
                                        0
                                    )
                                ) as net_value'
                            ),

                            \DB::raw(
                                '(
                                    select net_value*(1 + (if (payments.customer_pay_installment_fees and payments.installment_fee is not null, payments.installment_fee/100, 0)))
                                ) as final_value'
                            ),
                        )
                        ->where('payments.company_id', $this->id)
                        ->where('payments.is_accepted', true)
                        ->where('payments.status_payment_id', 2)
                        ->where('payments.balance', false)
                        ->whereNull('payments.plan_id');

        return $revenues;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subscriptions()
    {
        return $this->hasMany(\App\Models\Subscription::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partnerSubscriptions()
    {
        return $this->belongsToMany(\App\Models\Subscription::class, 'subscription_partners', 'company_id', 'subscription_id')
                    ->withPivot(
                        [
                            "id",
                            "company_id",
                            'subscription_id',
                            "created_at",
                            "updated_at",
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\CompanyCategory::class, 'company_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function applications()
    {
        return $this->hasMany(\App\Models\Application::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customers()
    {
        return $this->belongsToMany(\App\Models\User::class, \App\Models\CompanyCustomer::class, 'company_id', 'user_id')
                    ->withPivot(
                        [
                            'id',
                            'uuid',
                            'company_id',
                            'user_id',
                            'observation',
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function followers()
    {
        return $this->belongsToMany(\App\Models\User::class, \App\Models\CompanyFollower::class, 'company_id', 'user_id')
                    ->withPivot(
                        [
                            'id', 
                            'company_id',
                            'user_id',
                            'accepted_mails', 
                            'accepted_pushs', 
                            'accepted_sms', 
                            'accepted_whatsapp',
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vouchers()
    {
        return $this->hasMany(\App\Models\Voucher::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaigns()
    {
        return $this->hasMany(\App\Models\Campaign::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partners()
    {
        return $this->belongsToMany(\App\Models\Company::class, \App\Models\CompanyPartner::class, 'company_id', 'partner_id')
                    ->withPivot(
                        [
                            'id',
                            'company_id',
                            'partner_id',
                            'has_public_store',
                            'cashback_percentage',
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function campaignsAutomatic()
    {
        return $this->belongsToMany(\App\Models\CampaignAutomatic::class, 'campaign_automatic_companies', 'company_id', 'campaign_automatic_id')
            ->withPivot(
                [
                    "id",
                    'campaign_automatic_id',
                    'company_id',
                    'settings',
                    "is_active"
                ]
            )
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function checkIns()
    {
        return $this->hasMany(\App\Models\CheckIn::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function employees()
    {
        return $this->belongsToMany(\App\Models\User::class, \App\Models\CompanyEmployee::class, 'company_id', 'user_id')
                    ->withPivot(
                        [
                            'id',
                            'company_id',
                            "user_id", 
                            'company_position_id',
                            'is_accepted',
                            "created_at", 
                            "updated_at",
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function modules()
    {
        return $this->belongsToMany(\App\Models\Module::class, 'company_module', 'company_id', 'module_id')->withPivot(["id", 'config_json', "is_active"])->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function giftcards()
    {
        return $this->hasMany(\App\Models\Giftcard::class, 'company_id')->where('giftcards.is_product', false);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Giftcard::class, 'company_id')->where('giftcards.is_product', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function carts()
    {
        return $this->hasMany(\App\Models\Cart::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function surveys()
    {
        return $this->hasManyThrough(\App\Models\Survey::class, \App\Models\Question::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function subscriptionBenefits()
    {
        return $this->hasManyThrough(\App\Models\SubscriptionBenefit::class, \App\Models\Subscription::class, 'company_id', 'subscription_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function feedbacks()
    {
        return $this->hasManyThrough(\App\Models\Feedback::class, \App\Models\Payment::class, 'company_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tags()
    {
        return $this->hasMany(\App\Models\Tag::class, 'company_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function introductionSteps()
    {
        return $this->hasMany(\App\Models\IntroductionStep::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matches()
    {
        return $this->hasMany(\App\Models\Match::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function players()
    {
        return $this->hasMany(\App\Models\Player::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function news()
    {
        return $this->hasMany(\App\Models\News::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sponsors()
    {
        return $this->hasMany(\App\Models\Sponsor::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function banners()
    {
        return $this->hasMany(\App\Models\Banner::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function promotionalCodes()
    {
        // return $this->hasMany(\App\Models\PromoCodeCompany::class, 'company_id');
        return $this->belongsToMany(\App\Models\PromotionalCode::class, 'promotional_code_vouchers', 'company_id', 'promotional_code_id')
                    ->withPivot(
                        [
                            'id',
                            'promotional_code_id',
                            'company_id',
                            'giftcard_id',
                            'product_id',
                            'value',
                            'description',
                            //'validity_days',
                            'payment_minimum_value',
                            'created_at',
                            'updated_at'
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function giftcardCategories()
    {
        return $this->hasMany(\App\Models\GiftcardCategory::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function positions()
    {
        return $this->hasMany(\App\Models\CompanyPosition::class, 'company_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function championships()
    {
        return $this->hasMany(\App\Models\Championship::class, 'company_id');
    }

    // =========================================================================
    // Getters
    // =========================================================================

    public function getCustomerMetrics($user_id)
    {
        if (!$this->customers()->find($user_id)) return null;

        $visits = \DB::table('check_ins')
                        ->where('check_ins.user_id', $user_id)
                        ->where('check_ins.company_id', $this->id)
                        ->orderBy('check_ins.visit_time', 'desc');
        $last_visit = (clone $visits)->first();
        $last_visit = $last_visit ? \Carbon::create($last_visit->visit_time) : null;
        $total_visits = (clone $visits)->count();

        $preference_day = (clone $visits)
                                ->select(
                                    \DB::raw('dayofweek(check_ins.visit_time) as visit_day_of_week'),
                                    \DB::raw('count(*) as frequency'),
                                )
                                ->groupBy('visit_day_of_week')
                                ->orderBy('frequency', 'desc')
                                ->first();
        $preference_time = (clone $visits)
                                ->select(
                                    \DB::raw('hour(check_ins.visit_time) as visit_hour'),
                                    \DB::raw('count(*) as frequency'),
                                )
                                ->groupBy('visit_hour')
                                ->orderBy('frequency', 'desc')
                                ->first();

        $payments = \DB::table('payments')
                        ->select(
                            \DB::raw('
                                (
                                    payments.value 
                                    - (select if (count(vouchers.total_value) > 0, sum(vouchers.total_value), 0) from vouchers where vouchers.id = payments.used_voucher_id)
                                    - (select if (count(payment_with_subscription.discount) > 0, sum(payment_with_subscription.discount), 0) from payment_with_subscription where payment_with_subscription.payment_id = payments.id)
                                ) as value
                            ')
                        )
                        ->where('payments.company_id', $this->id)
                        ->where('payments.status_payment_id', 2)
                        ->where('payments.user_id', $user_id)
                        ->where('payments.is_accepted', true);
        $total_payments_values = (clone $payments)->sum('value');
        $average_payments = (clone $payments)->avg('value');
        
        $vouchers_redeemed = \DB::table('vouchers')
                                ->where('vouchers.user_id', $user_id)
                                ->where('vouchers.company_id', $this->id)
                                ->whereNotNull('vouchers.redeemed_at');
        $total_vouchers_used_values = (clone $vouchers_redeemed)->sum('vouchers.total_value');
        $total_vouchers_used = (clone $vouchers_redeemed)->count();

        $metrics = 
        [
            'last_visit' => $last_visit,
            'total_visits' => $total_visits,
            'preference_day' =>  ($preference_day) ? $preference_day->visit_day_of_week : null,
            'preference_time' => ($preference_time) ? $preference_time->visit_hour : null,
            'total_payments_values' => $total_payments_values,
            'average_payments' => $average_payments,
            'total_vouchers_used_values' => $total_vouchers_used_values,
            'total_vouchers_used' => $total_vouchers_used,
        ];

       return $metrics;
    }

    public function getDiscloseLinkAttribute()
    {
        return route('register.user.customer.index', $this->id);
    }
    
    public function getAcceptedInstallmentAttribute()
    {
        return $this->accepted_installment_quantity >= 1 ? true : false;
    }

    public function getAverageRatingAttribute()
    {
        $feedbacks_average = $this->feedbacks->whereNotNull('average_rating')->avg('average_rating');
        return ($feedbacks_average) ? round($feedbacks_average, 2) : null;
    }

    public function getCountRatingAttribute()
    {
        $feedbacks_count = $this->feedbacks->whereNotNull('average_rating')->count();
        return ($feedbacks_count) ? $feedbacks_count : null;
    }

    public function getDiscloseAccessCountAttribute()
    {
        return DiscloseLogs::where('access', true)->where('company_id', $this->id)->count();
    }

    public function getDiscloseAccessCountByType($type = null)
    {
        return DiscloseLogs::where('access', true)->where('company_id', $this->id)->where('type', $type)->count();
    }

    public function getDiscloseRegisterCountAttribute()
    {
        return DiscloseLogs::where('register', true)->where('company_id', $this->id)->count();
    }

    /**
     * Get company photo or a default photo
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return empty($this->attributes['photo']) ? "https://images.pexels.com/photos/2309235/pexels-photo-2309235.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" : $this->attributes['photo'];
    }

    /**
     * Get readable_balance
     *
     * @return string
     */
    public function getReadableBalanceAttribute()
    {
        return Functions::formatCurrency($this->balance);
    }

    /**
     * Get readable_created_at
     *
     * @return string
     */
    public function getReadableCreatedAtAttribute()
    {
        return Functions::formatDatetime($this->created_at);
    }

    /**
     * Get readable_updated_at
     *
     * @return string
     */
    public function getReadableUpdatedAtAttribute()
    {
        return Functions::formatDatetime($this->updated_at);
    }

    /**
     * Get readable_latitude
     *
     * @return string
     */
    public function getReadableLatitudeAttribute()
    {
        return Functions::formatCoordinate($this->latitude);
    }

    /**
     * Get readable_longitude
     *
     * @return string
     */
    public function getReadableLongitudeAttribute()
    {
        return Functions::formatCoordinate($this->longitude);
    }

    /**
     * Get readable_is_active
     *
     * @return string
     */
    public function getReadableIsActiveAttribute()
    {
        return Functions::formatBoolean($this->is_active);
    }

    /**
     * Get full_address
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        $fullAddress = "";
        $fullAddress .= empty($this->address) ? "" : $this->address;
        $fullAddress .= empty($this->number) ? "" : (empty($fullAddress) ? $this->number : ", Nº $this->number");
        $fullAddress .= empty($this->complement) ? "" : (empty($fullAddress) ? $this->complement : ", $this->complement");
        $fullAddress .= empty($this->neighborhood) ? "" : (empty($fullAddress) ? $this->neighborhood : " - $this->neighborhood");
        $fullAddress .= empty($this->city) ? "" : (empty($fullAddress) ? $this->city : " - $this->city");
        $fullAddress .= empty($this->state) ? "" : (empty($fullAddress) ? $this->state : "/$this->state");
        $fullAddress .= empty($this->zipcode) ? "" : (empty($fullAddress) ? $this->zipcode : " ($this->zipcode)");

        return empty($fullAddress) ? null : $fullAddress;
    }

    /**
     * Check whether company photo is default or not
     *
     * @return boolean
     */
    public function isPhotoDefault()
    {
        return empty($this->attributes['photo']) ?? false;
    }

    public function scopeByHoldingId($query, $id)
    {
        return $query->where('holding_id', $id);
    }

    public function scopeNearBy($query, int $holding_id, float $latitude, float $longitude, float $max_distance)
    {
        return $query->select(
                        \DB::raw("*, ROUND((
                            6371*acos(
                                cos( radians(  ?  ) ) *
                                cos( radians( latitude ) ) *
                                cos( radians( longitude ) - radians(?) ) +
                                sin( radians(  ?  ) ) *
                                sin( radians( latitude ) )
                            )
                            ), 3) AS distance")
                    )
                    ->having("distance", "<", $max_distance)
                    ->having("holding_id", $holding_id)
                    ->orderBy("distance")
                    ->take(10)
                    ->setBindings([$latitude, $longitude, $latitude]);
    }

    public function promotions($user = null)
    {
        if (!$user) $user = \Auth::user();

        return app('CampaignQueryService')->getTodayOldCampaignsVouchersToUser($user, $this);
    }

    public function getMetricsAttribute()
    {
        $vouchers = $this->vouchers();
        $payments = $this->payments();
        $customers = $this->customers();
        $followers = $this->followers();

        $metrics = (object)
        [
            'vouchers_completed'                => (clone $vouchers)
                                                        ->whereRaw('vouchers.total_value = vouchers.current_value')
                                                        ->where('vouchers.is_promotional', false)
                                                        ->count(),
            'vouchers_used'                     => (clone $vouchers)
                                                        ->whereRaw('vouchers.total_value = vouchers.current_value')
                                                        ->where('vouchers.is_promotional', false)
                                                        ->whereNotNull('redeemed_at')
                                                        ->count(),
            'vouchers_accumulated'              => (clone $vouchers)
                                                        ->whereRaw('vouchers.total_value != vouchers.current_value')
                                                        ->whereNull('redeemed_at')
                                                        ->count(),

            'total_customers'                   => (clone $customers)->count(),
            'total_customers_this_month'        => (clone $payments)
                                                        ->distinct('payments.user_id')
                                                        ->where('payments.status_payment_id', 2)
                                                        ->whereBetween('payments.created_at', [\Carbon::now()->startOfMonth(), \Carbon::now()])
                                                        ->whereIn('payments.user_id', $customers->pluck('users.id'))
                                                        ->count(),
            'total_customers_new_this_month'    => (clone $customers)
                                                        ->whereBetween('company_customer.created_at', [\Carbon::now()->startOfMonth(), \Carbon::now()])
                                                        ->count(),

            'total_followers'                   => (clone $followers)->count(),
            'total_followers_this_month'        => (clone $payments)
                                                        ->distinct('payments.user_id')
                                                        ->where('payments.status_payment_id', 2)
                                                        ->whereBetween('payments.created_at', [\Carbon::now()->startOfMonth(), \Carbon::now()])
                                                        ->whereIn('payments.user_id', $followers->pluck('users.id'))
                                                        ->count(),
            'total_followers_new_this_month'    => (clone $followers)
                                                        ->wherePivotBetween('created_at', [\Carbon::now()->startOfMonth(), \Carbon::now()])
                                                        ->count(),
        ];

        return $metrics;
    }

    public function getPerformancePeriodCompare($this_period_start, $this_period_end, $compare_period_start = null, $compare_period_end = null)
    {
        $company_id = $this->id;

        //$visits = \DB::table('check_ins')->where('check_ins.company_id', $company_id);
        $visits = $this->checkIns();

        $visits_this_period = (clone $visits)->whereBetween('check_ins.created_at', [$this_period_start, $this_period_end]);
        // $total_visits_this_period = (clone $visits_this_period)->count();
        // if ($compare_period_start)
        // {
        //     $visits_compare_period = (clone $visits)->whereBetween('check_ins.created_at', [$compare_period_start, $compare_period_end]);

        //     $total_visits_compare_period = (clone $visits_compare_period)->count();
        //     $percentage_visits_compare_period = ($total_visits_this_period/(($total_visits_compare_period > 0) ? $total_visits_compare_period : 1)*100) - 100;
        // }

        //$payments = \DB::table('payments')
        $payments = $this->payments()
                        //->where('payments.company_id', $company_id)
                        ->where('payments.is_accepted', true)
                        ->where('payments.status_payment_id', 2);

        $payments_this_period = (clone $payments)->whereBetween('payments.created_at', [$this_period_start, $this_period_end]);
        $total_payments_this_period = (clone $payments_this_period)->count();
        if ($compare_period_start) 
        {
            $payments_compare_period = (clone $payments)->whereBetween('payments.created_at', [$compare_period_start, $compare_period_end]);

            $total_payments_compare_period = (clone $payments_compare_period)->count();
            $percentage_total_payments_compare_period = ($total_payments_this_period/(($total_payments_compare_period > 0) ? $total_payments_compare_period : 1)*100) - 100;
        }

        $total_sales_this_period = (clone $payments_this_period)->sum('payments.value');
        if ($compare_period_start) 
        {
            $total_sales_compare_period = (clone $payments_compare_period)->sum('payments.value');
            $percentage_total_sales_compare_period = ($total_sales_this_period/(($total_sales_compare_period > 0) ? $total_sales_compare_period : 1)*100) - 100;
        }

        $total_payments_used_voucher_this_period = (clone $payments_this_period)->whereNotNull('payments.used_voucher_id')->count();
        if ($compare_period_start) 
        {
            $total_payments_used_voucher_compare_period = (clone $payments_compare_period)->whereNotNull('payments.used_voucher_id')->count();
            $percentage_total_payments_used_voucher_compare_period = ($total_payments_used_voucher_this_period/(($total_payments_used_voucher_compare_period > 0) ? $total_payments_used_voucher_compare_period : 1)*100) - 100;
        }

        $total_payments_subscription_this_period = (clone $payments_this_period)->whereNotNull('payments.subscription_id')->count();
        if ($compare_period_start) 
        {
            $total_payments_subscription_compare_period = (clone $payments_compare_period)->whereNotNull('payments.subscription_id')->count();
            $percentage_total_payments_subscription_compare_period = ($total_payments_subscription_this_period/(($total_payments_subscription_compare_period > 0) ? $total_payments_subscription_compare_period : 1)*100) - 100;
        }

        //$customers = \DB::table('company_customer')->where('company_customer.company_id', $company_id);
        $customers = $this->customers();

        $customers_this_period = (clone $customers)->whereBetween('company_customer.created_at', [$this_period_start, $this_period_end]);
        if ($compare_period_start) 
        {
            $customers_compare_period = (clone $customers)->whereBetween('company_customer.created_at', [$compare_period_start, $compare_period_end]);
        }

        $total_customers = (clone $customers)->count();
        $total_customers_this_period = (clone $customers_this_period)->count();
        if ($compare_period_start) 
        {
            $total_customers_compare_period = (clone $customers_compare_period)->count();
            $percentage_total_customers_compare_period = ($total_customers_this_period/(($total_customers_compare_period > 0) ? $total_customers_compare_period : 1)*100) - 100;
        }

        $campaign_dispatches = \DB::table('campaign_dispatches')->where('campaign_dispatches.company_id', $company_id);

        $campaign_dispatches_this_period = (clone $campaign_dispatches)->whereBetween('campaign_dispatches.created_at', [$this_period_start, $this_period_end]);
        if ($compare_period_start) 
        {
            $campaign_dispatches_compare_period = (clone $campaign_dispatches)->whereBetween('campaign_dispatches.created_at', [$compare_period_start, $compare_period_end]);
        }

        $total_campaign_dispatches_this_period = (clone $campaign_dispatches_this_period)->count();
        if ($compare_period_start) 
        {
            $total_campaign_dispatches_compare_period = (clone $campaign_dispatches_compare_period)->count();
            $percentage_total_campaign_dispatches_compare_period = ($total_campaign_dispatches_this_period/(($total_campaign_dispatches_compare_period > 0) ? $total_campaign_dispatches_compare_period : 1)*100) - 100;
        }

        $total_payments_store_this_period = (clone $payments_this_period)->whereNotNull('payments.giftcard_id')->count();
        if ($compare_period_start) 
        {
            $total_payments_store_compare_period = (clone $payments_compare_period)->whereNotNull('payments.giftcard_id')->count();
            $percentage_total_payments_store_compare_period = ($total_payments_store_this_period/(($total_payments_store_compare_period > 0) ? $total_payments_store_compare_period : 1)*100) - 100;
        }

        //$subscription_members = \DB::table('subscriptions')
        $subscription_members = $this->subscriptions()
                                    //->where('subscriptions.company_id', $company_id)
                                    ->join('subscription_member', 'subscriptions.id', 'subscription_member.subscription_id');

        $total_subscription_members_new_this_period = (clone $subscription_members)
                                                            ->whereNotNull('subscription_member.expiration_date')
                                                            ->whereBetween('subscription_member.created_at', [$this_period_start, $this_period_end])
                                                            ->count();
        $total_subscription_members_expired_this_period = (clone $subscription_members)
                                                                ->whereNotNull('subscription_member.expiration_date')
                                                                ->whereBetween('subscription_member.expiration_date', [$this_period_start, $this_period_end])
                                                                ->count();

        $feedbacks = $this->feedbacks->whereNotNull('average_rating');

        $feedbacks_this_period = (clone $feedbacks)->whereBetween('created_at', [$this_period_start, $this_period_end]);
        $total_feedbacks_positive_this_period = 0;
        $total_feedbacks_neutral_this_period = 0;
        $total_feedbacks_negative_this_period = 0;
        foreach ($feedbacks_this_period as $feedback_this_period) 
        {
            if (9 <= $feedback_this_period->average_rating && $feedback_this_period->average_rating <= 10) $total_feedbacks_positive_this_period++;
            else if (7 <= $feedback_this_period->average_rating && $feedback_this_period->average_rating < 9) $total_feedbacks_neutral_this_period++;
            else $total_feedbacks_negative_this_period++;
        }
        $nps_this_period = ($feedbacks_this_period->count() > 0) ? ((($total_feedbacks_positive_this_period/$feedbacks_this_period->count()) - ($total_feedbacks_negative_this_period/$feedbacks_this_period->count()))*100) : 0;

        $communication_dispatches = \DB::table('communication_dispatches')->where('communication_dispatches.company_id', $company_id);

        $communication_dispatches_this_period = (clone $communication_dispatches)->whereBetween('communication_dispatches.created_at', [$this_period_start, $this_period_end]);
        $total_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->count();
        $total_push_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->where('communication_dispatches.has_push', true)->count();
        $total_email_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->where('communication_dispatches.has_email', true)->count();
        $total_whatsapp_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->where('communication_dispatches.has_whatsapp', true)->count();
        $total_voucher_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->where('communication_dispatches.has_voucher', true)->count();
        $total_sms_communication_dispatches_this_period = (clone $communication_dispatches_this_period)->where('communication_dispatches.has_sms', true)->count();

        $company_performance =
        [
            //'total_visits_this_period' => $total_visits_this_period,
            'percentage_visits_compare_period' => (isset($percentage_visits_compare_period)) ? $percentage_visits_compare_period : null,
            'percentage_visits_compare_period_is_positive' => (isset($percentage_visits_compare_period)) ? (($percentage_visits_compare_period > 0) ? true : false) : null,

            'total_payments_this_period' => $total_payments_this_period,
            'percentage_total_payments_compare_period' => (isset($percentage_total_payments_compare_period)) ? $percentage_total_payments_compare_period : null,
            'percentage_total_payments_compare_period_is_positive' => (isset($percentage_total_payments_compare_period)) ? (($percentage_total_payments_compare_period > 0) ? true : false) : null,

            'total_sales_this_period' => $total_sales_this_period,
            'percentage_total_sales_compare_period' => (isset($percentage_total_sales_compare_period)) ? $percentage_total_sales_compare_period : null,
            'percentage_total_sales_compare_period_is_positive' => (isset($percentage_total_sales_compare_period)) ? (($percentage_total_sales_compare_period > 0) ? true : false) : null,

            'total_payments_used_voucher_this_period' => $total_payments_used_voucher_this_period,
            'percentage_total_payments_used_voucher_compare_period' => (isset($percentage_total_payments_used_voucher_compare_period)) ? $percentage_total_payments_used_voucher_compare_period : null,
            'percentage_total_payments_used_voucher_compare_period_is_positive' => (isset($percentage_total_payments_used_voucher_compare_period)) ? (($percentage_total_payments_used_voucher_compare_period > 0) ? true : false) : null,

            'total_payments_subscription_this_period' => $total_payments_subscription_this_period,
            'percentage_total_payments_subscription_compare_period' => (isset($percentage_total_payments_subscription_compare_period)) ? $percentage_total_payments_subscription_compare_period : null,
            'percentage_total_payments_subscription_compare_period_is_positive' => (isset($percentage_total_payments_subscription_compare_period)) ? (($percentage_total_payments_subscription_compare_period > 0) ? true : false) : null,

            'total_customers' => $total_customers,

            'total_customers_this_period' => $total_customers_this_period,
            'percentage_total_customers_compare_period' => (isset($percentage_total_customers_compare_period)) ? $percentage_total_customers_compare_period : null,
            'percentage_total_customers_compare_period_is_positive' => (isset($percentage_total_customers_compare_period)) ? (($percentage_total_customers_compare_period > 0) ? true : false) : null,

            'total_campaign_dispatches_this_period' => $total_campaign_dispatches_this_period,
            'percentage_total_campaign_dispatches_compare_period' => (isset($percentage_total_campaign_dispatches_compare_period)) ? $percentage_total_campaign_dispatches_compare_period : null,
            'percentage_total_campaign_dispatches_compare_period_is_positive' => (isset($percentage_total_campaign_dispatches_compare_period)) ? (($percentage_total_campaign_dispatches_compare_period > 0) ? true : false) : null,

            'total_payments_store_this_period' => $total_payments_store_this_period,
            'percentage_total_payments_store_compare_period' => (isset($percentage_total_payments_store_compare_period)) ? $percentage_total_payments_store_compare_period : null,
            'percentage_total_payments_store_compare_period_is_positive' => (isset($percentage_total_payments_store_compare_period)) ? (($percentage_total_payments_store_compare_period > 0) ? true : false) : null,

            'total_subscription_members_new_this_period' => $total_subscription_members_new_this_period,
            'total_subscription_members_expired_this_period' => $total_subscription_members_expired_this_period,

            'total_feedbacks_positive_this_period' => $total_feedbacks_positive_this_period,
            'total_feedbacks_neutral_this_period' => $total_feedbacks_neutral_this_period,
            'total_feedbacks_negative_this_period' => $total_feedbacks_negative_this_period,
            'nps_this_period' => $nps_this_period,

            'total_communication_dispatches_this_period' => $total_communication_dispatches_this_period,
            'total_push_communication_dispatches_this_period' => $total_push_communication_dispatches_this_period,
            'total_email_communication_dispatches_this_period' => $total_email_communication_dispatches_this_period,
            'total_whatsapp_communication_dispatches_this_period' => $total_whatsapp_communication_dispatches_this_period,
            'total_voucher_communication_dispatches_this_period' => $total_voucher_communication_dispatches_this_period,
            'total_sms_communication_dispatches_this_period' => $total_sms_communication_dispatches_this_period,
        ];

        return array_filter($company_performance, function ($value) { return !is_null($value); });
    }

    public function getCurrentSpotenFeeConfigurationAttribute()
    {
        $current_plan = $this->currentPlan();

        if ($current_plan) 
        {
            $holding = $this->holding;

            $period_start = \Carbon::now()->startOfMonth();
            $period_end = \Carbon::now()->endOfMonth();

            $total_revenue = $this->revenues()
                                ->whereBetween('payments.created_at',  [$period_start, $period_end])
                                ->get()
                                ->sum('final_value');

            $spoten_fee_configurations = (array) json_decode($current_plan->pivot->spoten_fee_configurations, true);

            foreach ($spoten_fee_configurations as $spoten_fee_configuration) 
            {
                if (!is_null($spoten_fee_configuration['revenue_min']) && !is_null($spoten_fee_configuration['revenue_max'])) 
                {
                    if ($spoten_fee_configuration['revenue_min'] <= $total_revenue && $total_revenue <= $spoten_fee_configuration['revenue_max']) {} 
                    else continue;
                } 
                else if (!is_null($spoten_fee_configuration['revenue_min'])) 
                {
                    if ($spoten_fee_configuration['revenue_min'] <= $total_revenue) {} 
                    else continue;
                } 
                else if (!is_null($spoten_fee_configuration['revenue_max'])) 
                {
                    if ($total_revenue <= $spoten_fee_configuration['revenue_max']) {} 
                    else continue;
                } 
                else continue;

                $current_spoten_fee_configuration = $spoten_fee_configuration;
                break;
            }

            if (!isset($current_spoten_fee_configuration)) 
            {
                $current_spoten_fee_configuration =
                [
                    'default' => true,
                    'giftcard' => $holding->default_spoten_fee_giftcard,
                    'subscription_credit' => $holding->default_spoten_fee_subscription_credit,
                    'subscription_debit' => $holding->default_spoten_fee_subscription_debit,
                    'subscription_pix' => $holding->default_spoten_fee_subscription_pix,
                    'credit' => $holding->default_spoten_fee_credit,
                    'debit' => $holding->default_spoten_fee_debit,
                    'pix' => $holding->default_spoten_fee_pix,
                ];
            }

            $current_spoten_fee_configuration['total_revenue'] = $total_revenue;
            $current_spoten_fee_configuration['period_start'] = $period_start;
            $current_spoten_fee_configuration['period_end'] = $period_end;
            $current_spoten_fee_configuration['fixed_pix_value'] = $holding->default_spoten_fee_fixed_pix_value;
            $current_spoten_fee_configuration['fixed_debit_value'] = $holding->default_spoten_fee_fixed_debit_value;
            $current_spoten_fee_configuration['fixed_credit_value'] = $holding->default_spoten_fee_fixed_credit_value;
            $current_spoten_fee_configuration['fixed_subscription_pix_value'] = $holding->default_spoten_fee_fixed_subscription_pix_value;
            $current_spoten_fee_configuration['fixed_subscription_debit_value'] = $holding->default_spoten_fee_fixed_subscription_debit_value;
            $current_spoten_fee_configuration['fixed_subscription_credit_value'] = $holding->default_spoten_fee_fixed_subscription_credit_value;

            return $current_spoten_fee_configuration;
        } 
        else return null;
    }

    public function getSpotenFeePixAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['pix'])) return (float) $current_spoten_fee_configuration['pix'];
        else return null;
    }

    public function getSpotenFeeDebitAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['debit'])) return (float) $current_spoten_fee_configuration['debit'];
        else return null;
    }

    public function getSpotenFeeCreditAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['credit'])) return $current_spoten_fee_configuration['credit'];
        else return null;
    }

    public function getSpotenFeeSubscriptionPixAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['subscription_pix'])) return (float) $current_spoten_fee_configuration['subscription_pix'];
        else return $this->spoten_fee_pix;
    }

    public function getSpotenFeeSubscriptionDebitAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['subscription_debit'])) return (float) $current_spoten_fee_configuration['subscription_debit'];
        else return $this->spoten_fee_debit;
    }

    public function getSpotenFeeSubscriptionCreditAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['subscription_credit'])) return $current_spoten_fee_configuration['subscription_credit'];
        else return $this->spoten_fee_credit;
    }

    public function getSpotenFeeGiftcardAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['giftcard'])) return (float) $current_spoten_fee_configuration['giftcard'];
        else return null;
    }

    public function getSpotenFeeFixedPixValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_pix_value'])) return (float) $current_spoten_fee_configuration['fixed_pix_value'];
        else return null;
    }

    public function getSpotenFeeFixedCreditValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_credit_value'])) return (float) $current_spoten_fee_configuration['fixed_credit_value'];
        else return null;
    }

    public function getSpotenFeeFixedDebitValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_debit_value'])) return (float) $current_spoten_fee_configuration['fixed_debit_value'];
        else return null;
    }

    public function getSpotenFeeFixedSubscriptionPixValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_subscription_pix_value'])) return (float) $current_spoten_fee_configuration['fixed_subscription_pix_value'];
        else return $this->spoten_fee_fixed_pix_value;
    }

    public function getSpotenFeeFixedSubscriptionCreditValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_subscription_credit_value'])) return (float) $current_spoten_fee_configuration['fixed_subscription_credit_value'];
        else return $this->spoten_fee_fixed_credit_value;
    }

    public function getSpotenFeeFixedSubscriptionDebitValueAttribute()
    {
        $current_spoten_fee_configuration = $this->current_spoten_fee_configuration;
        if ($current_spoten_fee_configuration && isset($current_spoten_fee_configuration['fixed_subscription_debit_value'])) return (float) $current_spoten_fee_configuration['fixed_subscription_debit_value'];
        else return $this->spoten_fee_fixed_debit_value;
    }

    public function getGatewayFeeCreditAttribute()
    {
        if (isset($this->holding->gateway_fee_credit)) return $this->holding->gateway_fee_credit;
        else return null;
    }

    public function getGatewayFeeDebitAttribute()
    {
        if (isset($this->holding->gateway_fee_debit)) return (float) $this->holding->gateway_fee_debit;
        else return null;
    }

    public function getGatewayFeePixAttribute()
    {
        if (isset($this->holding->gateway_fee_pix)) return (float) $this->holding->gateway_fee_pix;
        else return null;
    }

    public function getGatewayFeeFixedCreditValueAttribute()
    {
        if (isset($this->holding->gateway_fee_fixed_credit_value)) return (float) $this->holding->gateway_fee_fixed_credit_value;
        else return null;
    }

    public function getGatewayFeeAnticipationOfReceivablesAttribute()
    {
        if (isset($this->holding->gateway_fee_anticipation_of_receivables)) return (float) $this->holding->gateway_fee_anticipation_of_receivables;
        else return null;
    }

    public function getHasSubAccountAttribute()
    {
        return (
            isset($this->iugu_sub_account_id)
            //&& isset($this->safe2pay_sub_account_id) 
            //&& isset($this->stripe_sub_account_id)
        );
    }

    public function getWorkingTimeAttribute()
    {
        $working_time = json_decode((isset($this->attributes['working_time'])) ? $this->attributes['working_time'] : '[]', true);

        if (is_array($working_time)) 
        {
            foreach ($working_time as $working_time_index => $working_time_day) 
            {
                if (isset($working_time[$working_time_index]['closed'])) $working_time[$working_time_index]['closed'] = true;
                if (isset($working_time[$working_time_index]['index'])) $working_time[$working_time_index]['index'] = (int) $working_time[$working_time_index]['index'];
            }

            return $working_time;
        } 
        else return null;
    }

    public function getFinancialBalanceAttribute()
    {
        $gateway = new \App\Modules\Gateways\Iugu();

        $response = $gateway->getBalance($this);
        if (isset($response['success']) && $response['success']) 
        {
            $financial_balance['balance_available_for_withdraw'] = $response['balance_available_for_withdraw'];
            $financial_balance['receivable_balance'] = $response['receivable_balance'];

            return $financial_balance;
        } 
        else return null;
    }

    // =========================================================================
    // Setters
    // =========================================================================

    public function registerMediaCollections(): void
    {
        // you can define as many collections as needed
        $this->addMediaCollection('profile-pic')->singleFile();
        $this->addMediaCollection('album');
        $this->addMediaCollection('cover_image')->singleFile();
    }

    public function withdrawFinancialBalance($amount)
    {
        $gateway = new \App\Modules\Gateways\Iugu();

        $response = $gateway->withdrawBalance($this, $amount);
        return $response;
    }
}
