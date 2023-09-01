<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create
        (
            'plans', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->string('name');
                $table->double('value');
                $table->integer('months_free_trial')->default(0);

                $table->boolean('vouchers')->default(false);
                $table->boolean('surveys')->default(false);
                $table->boolean('giftcards')->default(false);
                $table->boolean('subcriptions')->default(false);
                $table->boolean('spoten_pay')->default(false);
                $table->boolean('individual_shipments')->default(false);
                $table->boolean('scheduling_shipments')->default(false);
                
                $table->integer('customers');
                $table->double('customers_price');
                $table->integer('free_shipments');
                $table->integer('employees');

                $table->double('mail_price');
                $table->double('sms_price');
                $table->double('push_price');
                $table->double('whatsapp_price');

                $table->timestamps();
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
        Schema::dropIfExists('plans');
    }
}
