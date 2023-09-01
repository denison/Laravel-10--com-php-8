<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNotificationsTableAddCompanyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) 
        {
            $table->integer('company_anchor_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('company_anchor_id')->references('id')->on('companies')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) 
        {
            $table->dropForeign(['company_anchor_id']);
            $table->dropColumn('company_anchor_id');
        });
    }
}
