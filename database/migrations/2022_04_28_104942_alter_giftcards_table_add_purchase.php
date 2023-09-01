<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giftcards', function (Blueprint $table) 
        {
            if (!Schema::hasColumn('giftcards', 'purchase_limit')) $table->integer('purchase_limit')->after('sales_limit')->nullable();
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
            if (!Schema::hasColumn('giftcards', 'purchase_limit')) $table->dropColumn('purchase_limit');
        });
    }
}
