<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddReceiverId extends Migration
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
            'payments',
            function (Blueprint $table)
            {
                $table->integer('receiver_user_id')->unsigned()->nullable()->after('giftcard_id');
                $table->foreign('receiver_user_id')->references('id')->on('users')->onUpdate('cascade');
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
            'payments',
            function (Blueprint $table)
            {
                $table->dropForeign(['receiver_user_id']);
                $table->dropColumn('receiver_user_id');
            }
        );
    }
}
