<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersUniqueFields extends Migration
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
                $table->unique(['email', 'deleted_at']);
                $table->unique(['phone', 'deleted_at']);
                $table->unique(['document', 'deleted_at']);
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
                $table->dropUnique(['email', 'deleted_at']);
                $table->dropUnique(['phone', 'deleted_at']);
                $table->dropUnique(['document', 'deleted_at']);
            }
        );
    }
}
