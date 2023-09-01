<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuizSubmissionsTableAddPaymentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_submissions', function (Blueprint $table) 
        {
            $table->integer('payment_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_submissions', function (Blueprint $table) 
        {
            $table->dropForeign(['payment_id']);
            $table->dropColumn('payment_id');
        });
    }
}
