<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAlterColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('name')->nullable(true)->change();
            $table->longText('surname')->nullable(true)->change();
            $table->longText('password')->nullable(true)->change();
            $table->boolean('is_active')->default(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('name')->nullable(false)->change();
            $table->longText('surname')->nullable(false)->change();
            $table->longText('password')->nullable(false)->change();
            $table->boolean('is_active')->default(false)->change();
        });
    }
}
