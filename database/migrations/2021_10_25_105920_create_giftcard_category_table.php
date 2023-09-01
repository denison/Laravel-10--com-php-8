<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftcardCategoryTable extends Migration
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
            'giftcard_categories', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->string('name');
                $table->string('description');
                $table->string('photo');

                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('giftcard_categories');
    }
}
