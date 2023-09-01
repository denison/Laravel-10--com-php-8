<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromoCodeIdToVouchersTable extends Migration
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
            $table->integer('promotional_code_id')->unsigned()->nullable()->after('company_id');
            $table->foreign('promotional_code_id')->references('id')->on('promotional_codes');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) 
        {
            $table->dropForeign(['promotional_code_id']);
            $table->dropColumn('promotional_code_id');
        });
    }
}
