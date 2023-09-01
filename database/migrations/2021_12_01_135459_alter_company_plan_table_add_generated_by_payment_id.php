<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableAddGeneratedByPaymentId extends Migration
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
            'company_plan',
            function (Blueprint $table)
            {
                $table->integer('generated_by_payment_id')->unsigned()->nullable();
                $table->foreign('generated_by_payment_id')->references('id')->on('payments')->onUpdate('cascade');
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
            'company_plan',
            function (Blueprint $table)
            {
                $table->dropForeign(['generated_by_payment_id']);
                $table->dropColumn('generated_by_payment_id');
            }
        );
    }
}
