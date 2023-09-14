<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPayment extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    public $table = 'status_payments';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    public $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be casted to native types
     *
     * @var array
     */
    protected $casts = [
        'id'           => 'integer',
        'name'         => 'string',
        'description'  => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    /**
     * The accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_updated_at',
    ];

    // =========================================================================
    // Relationships
    // =========================================================================
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'status_payment_id');
    }

    // =========================================================================
    // Getters
    // =========================================================================

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
}
