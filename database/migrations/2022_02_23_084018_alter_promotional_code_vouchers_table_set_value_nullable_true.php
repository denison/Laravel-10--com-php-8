<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableSetValueNullableTrue extends Migration
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
            'promotional_code_vouchers', 
            function (Blueprint $table) 
            {
                $table->decimal('value', 10, 2)->nullable(true)->change();
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
            'promotional_code_vouchers', 
            function (Blueprint $table) 
            {
                $table->decimal('value', 10, 2)->nullable(false)->change();
            }
        );
    }
}
