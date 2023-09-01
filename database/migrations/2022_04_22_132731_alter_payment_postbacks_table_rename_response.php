<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentPostbacksTableRenameResponse extends Migration
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
            'payment_postbacks', 
            function (Blueprint $table) 
            {
                $table->renameColumn('response', 'body');
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
            'payment_postbacks', 
            function (Blueprint $table) 
            {
                $table->renameColumn('body', 'response');
            }
        );
    }
}
