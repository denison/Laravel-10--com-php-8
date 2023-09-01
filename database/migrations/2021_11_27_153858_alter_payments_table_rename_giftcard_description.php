<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableRenameGiftcardDescription extends Migration
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
                $table->renameColumn('giftcard_description', 'message');
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
                $table->renameColumn('message', 'giftcard_description');
            }
        );
    }
}
