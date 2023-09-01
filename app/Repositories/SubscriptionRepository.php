<?php

namespace App\Repositories;

use App\Models\Subscription;

/**
 * Class SubscriptionRepository
 * @package App\Repositories
 * @version July 30, 2020, 11:23 am -03
 */
class SubscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'name',
        'description',
        'value',
        'card_image',
        'payment_link'
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
        return Subscription::class;
    }
}
