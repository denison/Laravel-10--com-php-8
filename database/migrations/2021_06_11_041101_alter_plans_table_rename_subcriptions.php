<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlansTableRenameSubcriptions extends Migration
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
            'plans', 
            function (Blueprint $table) 
            {
                $table->renameColumn('subcriptions', 'subscriptions');
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
            'plans', 
            function (Blueprint $table) 
            {
                $table->renameColumn('subscriptions', 'subcriptions');
            }
        );
    }
}
