<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddGeneratedCashback extends Migration
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
                $table->boolean('generated_cashback')->default(false);
                $table->boolean('is_accepted')->default(false)->change();
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
                $table->dropColumn('generated_cashback');

                /**
                 * @todo There is no column with name 'is_accepted' on table 'payments'
                 */
                if (Schema::hasColumn('payments', 'is_accepted'))
                {
                    $table->boolean('is_accepted')->default(true)->change();
                }

            }
        );
    }
}
