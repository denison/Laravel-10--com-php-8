<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMonthlyValueTableSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function ($table) 
        {
            $table->float('monthly_value')->nullable(true)->change();
            $table->float('yearly_value')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) 
        {
            $table->float('monthly_value')->nullable(false)->change();
            $table->float('yearly_value')->nullable(false)->change();
        });
    }
}
