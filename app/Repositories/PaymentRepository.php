<?php

namespace App\Repositories;

use App\Models\Payment;

/**
 * Class PaymentRepository
 * @package App\Repositories
 * @version July 30, 2020, 11:23 am -03
 */
class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'user_id',
        'order_id',
        'tax_coupon',
        'status_payment_id',
        'used_voucher_id',
        'credited_voucher_id',
        'type',
        'value',
        'description',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Payment::class;
    }
}
