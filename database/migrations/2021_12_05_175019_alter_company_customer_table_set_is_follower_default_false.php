<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCustomerTableSetIsFollowerDefaultFalse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_customer', function (Blueprint $table) {
            $table->boolean('is_follower')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_customer', function (Blueprint $table) {
            $table->boolean('is_follower')->default(true)->change();
        });
    }
}
