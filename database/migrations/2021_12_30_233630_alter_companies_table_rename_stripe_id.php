<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableRenameStripeId extends Migration
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
                $table->renameColumn('stripe_id', 'stripe_sub_account_id');
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
                $table->renameColumn('stripe_sub_account_id', 'stripe_id');
            }
        );
    }
}
