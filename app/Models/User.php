<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'holding_id',
        'name',
        'surname',
        'email',
        'password',
        'facebook_password',
        'google_password',
        'apple_password',
        'document',
        'phone',
        'gender',
        'birth_date',
        'is_active',
        'is_verified',
        'latitude_address',
        'longitude_address',
        'address',
        'neighborhood',
        'number',
        'city',
        'state',
        'complement',
        'reference',
        'zipcode',
        'latitude',
        'accepted_mails',
        'accepted_sms',
        'accepted_pushs',
        'accepted_whatsapp',
        'longitude',
        'document_photo',
        'selfie_photo',
        'photo',
        'email_verified_at',
        'phone_verified_at',
        'uuid',
        'imported_from_company_id',
        'stripe_customer_id',
        'iugu_customer_id_test',
        'iugu_customer_id_live',
        'wallet_balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id'                 => 'integer',
        'uuid'               => 'string',
        'holding_id'         => 'integer',
        'name'               => 'string',
        'surname'            => 'string',
        'email'              => 'string',
        'password'           => 'string',
        'facebook_password'  => 'string',
        'google_password'    => 'string',
        'apple_password'     => 'string',
        'document'           => 'string',
        'phone'              => 'string',
        'address'            => 'string',
        'neighborhood'       => 'string',
        'number'             => 'string',
        'city'               => 'string',
        'state'              => 'string',
        'complement'         => 'string',
        'reference'         => 'string',
        'zipcode'            => 'string',
        'latitude_address'   => 'float',
        'longitude_address'  => 'float',
        'latitude'           => 'float',
        'longitude'          => 'float',
        'gender'             => 'string',
        'birth_date'         => 'date',
        'is_active'          => 'boolean',
        'accepted_mails'     => 'boolean',
        'accepted_sms'       => 'boolean',
        'accepted_pushs'     => 'boolean',
        'accepted_whatsapp'  => 'boolean',
        'is_verified'        => 'boolean',
        'document_photo'     => 'string',
        'selfie_photo'       => 'string',
        'photo'              => 'string',
        'email_verified_at'  => 'datetime',
        'phone_verified_at'  => 'datetime',
        'imported_from_company_id'      => 'integer',
        'iugu_customer_id_live'     => 'string',
        'iugu_customer_id_test'     => 'string',
        'wallet_balance' => 'double',
    ];

     /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'role_name'  => 'required',
        //'name'       => 'required_if:role_name,manager,company,employee|name|max:120',
        'name'       => 'required_if:role_name,manager,company,employee|max:120',
        //'surname'    => 'required_if:role_name,manager,company,employee|name|max:120',
        // 'surname'    => 'required_if:role_name,manager,company,employee|max:120',
        //'password'   => 'required_if:role_name,manager,company,employee|string|min:6|confirmed',
        'password'   => 'nullable|required_without:keep_password|string|min:6|confirmed',
        //'password'   => 'nullable|string|min:6|confirmed', 
        'email'      => 'required_if:role_name,manager,company,employee|string|email|max:255',
        // 'document'   => 'required_if:role_name,manager,company|cpf_or_cnpj',//|min:14|max:14',
        // 'phone'      => 'required_if:role_name,manager,company',//|string|min:14|max:15',
        // 'gender'     => 'required_if:role_name,manager,company,employee',
        //'holding_id' => 'required_if:role_name,manager,company,employee,client',
        //'is_active'  => 'required',
    ];
    
     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function holding()
    {
        return $this->belongsTo(Holding::class, 'holding_id', 'id');
    }

    public function companiesOwner()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    public function companiesEmployee()
    {
        return $this->belongsToMany(Company::class, \App\Models\CompanyEmployee::class, 'user_id', 'company_id')
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }
}
