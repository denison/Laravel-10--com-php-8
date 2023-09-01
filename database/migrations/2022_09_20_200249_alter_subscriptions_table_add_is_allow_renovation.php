<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableAddIsAllowRenovation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->boolean('is_allow_renovation')->default(true);
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
        Schema::table(
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->dropColumn('is_allow_renovation');
            }
        );
    }
}
