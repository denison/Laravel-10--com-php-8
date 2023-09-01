<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddIsProduct extends Migration
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
            'giftcards', 
            function (Blueprint $table) 
            {
                $table->boolean('is_product')->nullable(false)->after('name')->default(true);
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
            'giftcards', 
            function (Blueprint $table) 
            {
               $table->dropColumn('is_product');
            }
        );
    }
}
