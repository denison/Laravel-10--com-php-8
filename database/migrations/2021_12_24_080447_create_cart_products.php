<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->integer('giftcard_id')->unsigned();
            $table->integer('value');
            $table->integer('quantity')->default(1);
            $table->integer('receiver_user_id')->unsigned()->nullable();
            $table->string('message')->nullable();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('receiver_user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('cart_product');
    }
}
