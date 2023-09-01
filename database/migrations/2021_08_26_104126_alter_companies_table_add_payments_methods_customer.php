<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddPaymentsMethodsCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table
        (
            'companies', 
            function (Blueprint $table) 
            {
                $table->json('accepted_payment_methods_checkin_customer')->nullable()->after('accepted_payment_methods_checkin');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table
        (
            'companies', 
            function (Blueprint $table) 
            {
                $table->dropColumn('accepted_payment_methods_checkin_customer');
            }
        );
    }

}
