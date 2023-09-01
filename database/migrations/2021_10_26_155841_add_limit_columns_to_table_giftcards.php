<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLimitColumnsToTableGiftcards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giftcards', function ($table)
        {
            $table->integer('sales_limit')->unsigned()->nullable();
            $table->boolean('is_giftable')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giftcards', function (Blueprint $table)
        {
            $table->dropColumn('is_giftable');
            $table->dropColumn('sales_limit');
        });
    }
}
