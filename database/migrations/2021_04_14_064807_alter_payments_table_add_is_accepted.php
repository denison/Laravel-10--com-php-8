<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddIsAccepted extends Migration
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
                $table->boolean('is_accepted')->default(true);
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
        // @todo Era pra ja existir essa coluna, mas só existe a is_confirmed
        // ver migration AlterPaymentsTableRenameIsConfirmed
        if (Schema::hasColumn('payments', 'is_accepted'))
        {
            Schema::table
            (
                'payments',
                function (Blueprint $table)
                {
                    $table->dropColumn('is_accepted');
                }
            );
        }
    }
}
