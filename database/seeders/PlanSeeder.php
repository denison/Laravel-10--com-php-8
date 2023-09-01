<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = 
        [
            [
                'name' => 'FREE TRIAL',
                'value' => 0,
                'months_free_trial' => 0,
                'months_duration' => 3,
                'renewable' => false,

                /*
                'vouchers' => false,
                'surveys' => false,
                'giftcards' => false,
                'subscriptions' => false,
                'spoten_pay' => false,
                'individual_shipments' => false,
                'scheduling_shipments' => false,
                */

                'customers' => 100,
                'customers_price' => 0.04,
                'free_shipments' => 10,
                //'employees' => 1,

                'mail_price' => 0.02,
                'sms_price' => 0.35,
                'push_price' => 0.05,
                'whatsapp_price' => 0.09
            ],
            [
                'name' => 'PRO',
                'value' => 399,
                'months_free_trial' => 0,
                'months_duration' => 1,
                'renewable' => true,

                /*
                'vouchers' => true,
                'surveys' => true,
                'giftcards' => true,
                'subscriptions' => true,
                'spoten_pay' => true,
                'individual_shipments' => true,
                'scheduling_shipments' => true,
                */

                'customers' => 500,
                'customers_price' => 0.03,
                'free_shipments' => 400,
                //'employees' => 10,

                'mail_price' => 0.02,
                'sms_price' => 0.35,
                'push_price' => 0.05,
                'whatsapp_price' => 0.09
            ]
        ];

        $plans = collect($plans);
        if ($plans->where('value', 0)->count() == 0) $plans[rand(0, $plans->count() - 1)]['value'] = 0;
        \DB::table('plans')->insert($plans->toArray());
    }
}
