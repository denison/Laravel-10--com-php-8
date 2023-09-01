<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableAddGiverUserId extends Migration
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
            'vouchers', 
            function (Blueprint $table) 
            {
                $table->integer('giver_user_id')->unsigned()->nullable(true)->default(null);
                $table->foreign('giver_user_id')->references('id')->on('users')->onDelete('restrict');
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
            'vouchers', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['giver_user_id']);
                $table->dropColumn('giver_user_id');
            }
        );
    }
}
