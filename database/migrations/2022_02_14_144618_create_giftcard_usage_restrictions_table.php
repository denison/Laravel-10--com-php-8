<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftcardUsageRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftcard_usage_restrictions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('giftcard_id')->unsigned();
            $table->integer('product_id')->unsigned();
            
            $table->unique(['giftcard_id', 'product_id']);
            $table->foreign('giftcard_id')->references('id')->on('giftcards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('giftcard_usage_restrictions');
    }
}
