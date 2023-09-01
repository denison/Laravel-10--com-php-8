<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddAcceptedMembershipTerms extends Migration
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
            'companies', 
            function (Blueprint $table) 
            {
                $table->boolean('accepted_membership_terms')->default(false);
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
            'companies', 
            function (Blueprint $table)
            {
                $table->dropColumn('accepted_membership_terms');
            }
        );
    }
}
