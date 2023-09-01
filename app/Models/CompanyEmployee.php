<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyEmployee extends Pivot
{
    protected $table = 'company_employee';

    public $fillable =
    [
        'company_position_id',
        'is_accepted',
    ];

    public function company()
    {
        return $this->hasOne(\App\Models\Company::class, 'id', 'company_id');
    }

    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    public function position()
    {
        return $this->hasOne(\App\Models\CompanyPosition::class, 'id', 'company_position_id');
    }
}
