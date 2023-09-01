<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableSetValueNullableFalse extends Migration
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
                $table->float('value')->nullable(false)->change();
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
                $table->float('value')->nullable(true)->change();
            }
        );
    }
}
