<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPartnersAddHasPublicStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_partners', function (Blueprint $table) 
        {
            $table->boolean('has_public_store')->default(true)->after('partner_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_partners', function (Blueprint $table) 
        {
            $table->dropColumn('has_public_store');
        });
    }
}
