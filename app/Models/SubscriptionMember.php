<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SubscriptionMember extends Pivot
{
    use HasFactory;

     /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'subscription_member';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'subscription_id',
        'user_id',
        'tittle',
        'is_cancelled',
        'description',
        'expiration_date',
        'card_id',
        'automatic_renovation',
        'generated_by_payment_id',
        'is_active',
        'installments_quantity',
        'payment_method',
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'subscription_id' => 'integer',
        'user_id' => 'integer',
        'tittle' => 'string',
        'is_cancelled' => 'boolean',
        'description' => 'string',
        'expiration_date' => 'datetime',
        'card_id' => 'integer',
        'automatic_renovation' => 'boolean',
        'generated_by_payment_id' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subscription_id'      => 'required',
        'user_id' => 'required',
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'status',
    ];

     // =========================================================================
    // Relationships
    // =========================================================================

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
