<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableDropStartDate extends Migration
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
            'vouchers', 
            function (Blueprint $table)
            {
                $table->dropColumn('start_date');
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
            'vouchers', 
            function (Blueprint $table)
            {
                $table->timestamp('start_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            }
        );
    }
}
