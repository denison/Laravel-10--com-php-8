<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdersTableDropIsConfirmed extends Migration
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
                $table->dropColumn('is_confirmed');    
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
                $table->boolean('is_confirmed')->default(false)->after('value');   
            }
        );
    }
}
