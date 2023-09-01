<?php

namespace App\Repositories;

use App\Models\Company;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version July 30, 2020, 11:23 am -03
 */
class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'holding_id',
        'name',
        'email',
        'color',
        'photo',
        'document',
        'phone',
        'description',
        'zipcode',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'instagram',
        'facebook',
        'whatsapp',
        'website',
        'complement',
        'reference',
        'latitude',
        'longitude',
        'accepted_spoten_pay',
        'accepted_membership_terms',
        'accepted_weekly_performance_report',
        'accepted_monthly_performance_report',
        'working_time',
        'free_shipments',
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
        return Company::class;
    }
}
