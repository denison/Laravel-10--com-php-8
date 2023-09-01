<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePromotionalCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_codes', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->integer('holding_id')->unsigned();
            $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('restrict')->onUpdate('cascade');

            $table->string('name');
            $table->string('code');
            $table->boolean('is_active')->default(true);
            $table->string('description', 512)->nullable();
            $table->string('photo', 512)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotional_codes');
    }
}
