<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableAddRedeemedByUserId extends Migration
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
            $table->integer('redeemed_by_user_id')->unsigned()->nullable()->after('redeemed_at');
            $table->foreign('redeemed_by_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
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
            $table->dropForeign(['redeemed_by_user_id']);
            $table->dropColumn('redeemed_by_user_id');
        });
    }
}
