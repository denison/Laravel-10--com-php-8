<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableAddCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) 
        {
            $table->integer('voucher_category_id')->unsigned()->nullable()->after('company_id');
            $table->foreign('voucher_category_id')->references('id')->on('voucher_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function(Blueprint $table)
        {
            $table->dropForeign(['voucher_category_id']);
            $table->dropColumn('voucher_category_id');
        });
    }
}
