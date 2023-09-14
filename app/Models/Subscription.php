<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'subscriptions';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'company_id',
        'name',
        'is_active',
        'description',
        'card_image',
        'quantity_vacancies',
        'is_accept_waiting_list',
        'value',
        'expired_at',
        'duration_days',
        'is_allow_renovation',
        'commercial_description',
        'accepted_payment_methods',
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id'                        => 'integer',
        'company_id'                => 'integer',
        'name'                      => 'string',
        'is_active'                 => 'boolean',
        'description'               => 'string',
        'card_image'                => 'string',
        'quantity_vacancies'        => 'integer',
        'is_accept_waiting_list'    => 'boolean',
        'value'                     => 'float',
        'duration_days'             => 'integer',
        'expired_at'                => 'datetime',
        'is_allow_renovation'       => 'boolean',
        'accepted_payment_methods'  => 'array',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id'          => 'required',
        'name'                => 'required',
        'value'        => 'required',
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_updated_at',
        'readable_expired_at',
        'readable_value',
        //'available_vacancies',
        //'commercial_description',
    ];


     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function partners()
    {
        return $this->belongsToMany(\App\Models\Company::class, 'subscription_partners', 'subscription_id', 'company_id')
                    ->withPivot(
                        [
                            "id", 
                            'subscription_id',
                            "company_id",
                            "created_at", 
                            "updated_at",
                        ]
                    )
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function members()
    {
        return $this->belongsToMany(User::class, SubscriptionMember::class, 'subscription_id', 'user_id')
                    ->withPivot(
                        [
                            "id", 
                            "subscription_id", 
                            'user_id',
                            'is_active',
                            "description", 
                            "expiration_date", 
                            'card_id',
                            'automatic_renovation', 
                            "is_cancelled", 
                            'payment_method', 
                            'generated_by_payment_id',
                            'installments_quantity',
                        ]
                    )
                    ->withTimestamps();
    }

     /**
     * Get card image or a default photo
     *
     * @return string
     */
    public function getCardImageAttribute()
    {
        return empty($this->attributes['card_image']) ? "/images/default-wide.png" : $this->attributes['card_image'];
    }

    /**
     * Check whether card_image is default or not
     *
     * @return boolean
     */
    public function isCardImageDefault()
    {
        return empty($this->attributes['card_image'])?? false;
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
     * Get readable_expired_at
     *
     * @return string
     */
    public function getReadableExpiredAtAttribute()
    {
        return Functions::formatDatetime($this->expired_at);
    }

    /**
     * Get readable_value
     *
     * @return string
     */
    public function getReadableValueAttribute()
    {
        return Functions::formatCurrency($this->value);
    }


}
