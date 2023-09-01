<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesCompanyDashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_user', function (Blueprint $table) {
            $table->index('expiration_date');
        });

        Schema::table('company_customer', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_user', function (Blueprint $table)
        {
            $table->dropIndex(['expiration_date']);
        });

        Schema::table('company_customer', function (Blueprint $table)
        {
            $table->dropIndex(['created_at']);
        });
    }
}
