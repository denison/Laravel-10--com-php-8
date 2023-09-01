<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionBenefitsTableAddPresential extends Migration
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
            'subscription_benefits',
            function (Blueprint $table)
            {
                $table->boolean('presential')->default(true)->after('description');
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
            'subscription_benefits',
            function (Blueprint $table)
            {
                $table->dropColumn('presential');
            }
        );
    }
}
