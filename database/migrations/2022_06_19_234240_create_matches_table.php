<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) 
        {
            $table->increments('id');
            
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('home_team_id')->unsigned();
            $table->foreign('home_team_id')->references('id')->on('teams')->onUpdate('cascade');
            $table->integer('challenging_team_id')->unsigned();
            $table->foreign('challenging_team_id')->references('id')->on('teams')->onUpdate('cascade');

            $table->boolean('is_active')->default(false);
            $table->date('date');
            $table->time('hour');
            $table->string('location');
            $table->mediumText('comment');

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
        Schema::dropIfExists('matches');
    }
}
