<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeFeedbacksTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('holding_id')->unsigned();
            $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('restrict');
            $table->string('name');
            $table->longText('description')->nullable();
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
        Schema::drop('type_feedbacks');
    }
}
