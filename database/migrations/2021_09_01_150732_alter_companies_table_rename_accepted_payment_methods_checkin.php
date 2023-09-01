<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableRenameAcceptedPaymentMethodsCheckin extends Migration
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
                $table->renameColumn('accepted_payment_methods_checkin', 'accepted_payment_methods_checkin_employee');
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
                $table->renameColumn('accepted_payment_methods_checkin_employee', 'accepted_payment_methods_checkin');
            }
        );
    }
}
