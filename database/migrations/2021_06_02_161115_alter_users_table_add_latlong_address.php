<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddLatlongAddress extends Migration
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
                $table->decimal('latitude_address', 10, 8)->nullable();
                $table->decimal('longitude_address', 10, 8)->nullable();
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
                $table->dropColumn('latitude_address');
                $table->dropColumn('longitude_address');
            }
        );
    }
}
