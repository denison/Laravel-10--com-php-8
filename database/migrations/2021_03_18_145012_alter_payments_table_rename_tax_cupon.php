<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableRenameTaxCupon extends Migration
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
                $table->renameColumn('tax_cupon', 'tax_coupon');
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
                $table->renameColumn('tax_coupon', 'tax_cupon');
            }
        );
    }
}
