<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersImportTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_import', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('holding_id')->unsigned()->nullable();
            $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('restrict');
            $table->string('name')->nullable();;
            $table->string('surname')->nullable();;
            $table->string('city')->nullable();;
            $table->string('state')->nullable();;
            $table->date('birth_date')->nullable();
            $table->string('email')->unique();
            $table->string('document')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_import');
    }
}
