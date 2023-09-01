<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableRemoveUniqueKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->dropUnique('users_phone_unique');
            $table->dropUnique('users_document_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        return; // Não volta as chaves pois o banco pode estar populado
        Schema::table('users', function (Blueprint $table) {
            $table->unique('email');
            $table->unique('phone');
            $table->unique('document');
        });
    }
}
