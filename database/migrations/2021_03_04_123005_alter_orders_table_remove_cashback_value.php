<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdersTableRemoveCashbackValue extends Migration
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
            'orders', 
            function (Blueprint $table) 
            {
                $table->dropColumn(['cashback_value']);
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
            'orders', 
            function (Blueprint $table) 
            {
                $table->double('cashback_value')->default(0)->after('value');
            }
        );
    }
}
