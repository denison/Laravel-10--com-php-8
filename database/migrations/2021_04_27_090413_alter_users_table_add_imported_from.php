<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddImportedFrom extends Migration
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
                $table->integer('imported_from')->unsigned()->nullable();
                $table->foreign('imported_from')->references('id')->on('companies')->onDelete('restrict');
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
                $table->dropForeign(['imported_from']);
                $table->dropColumn(['imported_from']);
            }
        );
    }
}
