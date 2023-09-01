<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddReference extends Migration
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
            'users', 
            function (Blueprint $table) 
            {
                $table->longText('reference')->nullable()->after('complement');
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
            'users', 
            function (Blueprint $table) 
            {
                $table->dropColumn('reference');
            }
        );
    }
}
