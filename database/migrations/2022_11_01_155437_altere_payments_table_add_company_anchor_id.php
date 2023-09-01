<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterePaymentsTableAddCompanyAnchorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) 
        {
            $table->integer('company_anchor_id')->unsigned()->nullable()->after('company_id');
            $table->foreign('company_anchor_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) 
        {
            $table->dropForeign(['company_anchor_id']);
            $table->dropColumn('company_anchor_id');
        });
    }
}
