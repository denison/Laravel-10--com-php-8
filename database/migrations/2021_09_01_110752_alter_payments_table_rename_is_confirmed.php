<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableRenameIsConfirmed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('payments', 'is_confirmed'))
        {
            Schema::table
            (
                'payments',
                function (Blueprint $table)
                {
                    $table->renameColumn('is_confirmed', 'is_accepted');
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('payments', 'is_accepted'))
        {
            Schema::table
            (
                'payments',
                function (Blueprint $table)
                {
                        $table->renameColumn('is_accepted', 'is_confirmed');
                }
            );
        }
    }
}
