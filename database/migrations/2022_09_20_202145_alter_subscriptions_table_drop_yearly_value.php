<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableDropYearlyValue extends Migration
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
                $table->dropColumn('yearly_value');
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
                $table->float('yearly_value')->nullable();
            }
        );
    }
}
