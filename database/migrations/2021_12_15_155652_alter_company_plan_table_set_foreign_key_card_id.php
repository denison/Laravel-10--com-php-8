<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableSetForeignKeyCardId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_plan', function (Blueprint $table) 
        {
            $table->dropForeign('company_plan_card_id_foreign');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_plan', function (Blueprint $table) 
        {
            $table->dropForeign('company_plan_card_id_foreign');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('restrict')->onUpdate('restrict');
        });
    }
}
