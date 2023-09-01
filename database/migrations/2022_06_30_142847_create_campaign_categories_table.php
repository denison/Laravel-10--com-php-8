<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'campaign_categories', 
            function (Blueprint $table) 
            {
                $table->increments('id');
            
                $table->integer('holding_id')->unsigned();
                $table->foreign('holding_id')->references('id')->on('holdings')->onUpdate('cascade');

                $table->string('name');

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
        Schema::dropIfExists('campaign_categories');
    }
}
