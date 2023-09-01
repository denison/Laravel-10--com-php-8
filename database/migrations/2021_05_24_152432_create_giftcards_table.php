<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftcardsTable extends Migration
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
            'giftcards', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->double('value');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
                
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
        Schema::dropIfExists('giftcards');
    }
}
