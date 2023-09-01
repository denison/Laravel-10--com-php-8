<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableDropPix extends Migration
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->dropColumn('pix_key');
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->string('pix_key')->nullable();
            }
        );
    }
}
