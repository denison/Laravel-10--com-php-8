<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuizSubmissionsTableAddSubscriptionMemberId extends Migration
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
            $table->integer('subscription_member_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('subscription_member_id')->references('id')->on('subscription_member')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign(['subscription_member_id']);
            $table->dropColumn('subscription_member_id');
        });
    }
}
