<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPushNotificationsTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('push_notifications');
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::create('push_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('holding_id')->unsigned();
            $table->string('title');
            $table->longText('message')->nullable();
            $table->json('user_ids');
            $table->datetime('schedule_time');
            $table->timestamps();
            $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('restrict');;
        });
    }
}
