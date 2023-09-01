<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championships', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->integer('company_id')->unsigned(); 
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUptade('cascade');

            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('photo')->nullable();
            
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
        Schema::dropIfExists('championships');
    }
}
