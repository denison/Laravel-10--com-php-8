<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImportCustomersToCompanyFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $customers = \DB::table('company_customer')->get()->toArray();
        foreach ($customers as $customer) 
        {
            \DB::table('company_followers')->insert([
                'user_id'           => $customer->user_id,
                'company_id'        => $customer->company_id,
                'created_at'        => $customer->created_at,
                'updated_at'        => $customer->updated_at,
                'accepted_mails'    => true,
                'accepted_pushs'    => true,
                'accepted_sms'      => true,
                'accepted_whatsapp' => true,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('company_followers')->delete();
    }
}
