<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'payments';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'company_anchor_id',
        'company_id',
        'order_id',
        'subscription_id',
        'giftcard_id',
        'product_id',
        'message',
        'receiver_user_id',
        'plan_id',
        'balance',
        'user_id',
        'used_voucher_id',
        'credited_voucher_id',
        'status_payment_id',
        'method',
        'value',
        'withdraw_date',
        'withdrawn_date',
        'spoten_fee',
        'description',
        'tax_coupon',
        'is_accepted',
        'gateway_name',
        'gateway_transaction_id',
        'created_at',
        'card_id',
        'cart_id',
        'installments_quantity',
        'installment_fee',
        'customer_pay_installment_fees',
        'gateway_split_fee',
        'subscription_invitation_id',
        'spoten_fee_fixed_value',
        'gateway_response',
        'is_reversed',
        'company_plan_id',
        'subscription_member_id',
        'used_wallet_balance_value',
        'gateway_fee',
        'gateway_fee_fixed_value',
        'gateway_split_fee_value',
        'gateway_account_api_token',
    ];

     /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id'                  => 'integer',
        'company_id'          => 'integer',
        'user_id'             => 'integer',
        'tax_coupon'          => 'string',
        'order_id'            => 'integer',
        'subscription_id'     => 'integer',
        'product_id'          => 'integer',
        'giftcard_id'         => 'integer',
        'message'             => 'string',
        'receiver_user_id'    => 'integer',
        'plan_id'             => 'integer',
        'balance'             => 'boolean',
        'status_payment_id'   => 'integer',
        'used_voucher_id'     => 'integer',
        'credited_voucher_id' => 'integer',
        'value'               => 'double',
        'cashback_value'      => 'double',
        'method'              => 'string',
        'withdrawn_date'      => 'datetime',
        'withdraw_date'       => 'json',
        'spoten_fee'          => 'double',
        'description'         => 'string',
        'gateway_name' => 'string',
        'gateway_transaction_id' => 'string',
        'is_accepted' => 'boolean',
        'generated_cashback' => 'boolean',
        'created_at' => 'datetime',
        'cart_id'               => 'integer',
        'installments_quantity' => 'integer',
        'installment_fee'      => 'double',
        'customer_pay_installment_fees' => 'boolean',
        'gateway_split_fee' => 'double',
        'subscription_invitation_id'     => 'integer',
        'is_processed' => 'boolean',
        'spoten_fee_fixed_value' => 'double',
        'gateway_response' => 'json',
        'is_reversed' => 'boolean',
        'used_wallet_balance_value' => 'double',
    ];

     /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id'        => 'required',
        'status_payment_id' => 'required',
        'value'             => 'required',
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\StatusPayment::class, 'status_payment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id')->withTrashed();
    }


}
