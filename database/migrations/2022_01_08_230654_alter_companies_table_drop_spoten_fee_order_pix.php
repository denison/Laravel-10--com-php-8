<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableDropSpotenFeeOrderPix extends Migration
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
                $table->dropColumn('spoten_fee_order_pix');
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
                $table->double('spoten_fee_order_pix')->default(1.1);
            }
        );
    }
}
