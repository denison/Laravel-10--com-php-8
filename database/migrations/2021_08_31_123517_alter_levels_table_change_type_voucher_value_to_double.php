<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLevelsTableChangeTypeVoucherValueToDouble extends Migration
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
            'levels', 
            function (Blueprint $table) 
            {
                $table->float('voucher_value')->change();
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
            'levels', 
            function (Blueprint $table) 
            {
                $table->integer('voucher_value')->change();
            }
        );
    }
}
