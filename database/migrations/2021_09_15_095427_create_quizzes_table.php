<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            
            $table->boolean('is_active')->default(true);

            $table->string('pre_answer_message')->nullable();
            $table->string('post_answer_message')->nullable();

            $table->integer('subscription_id')->unsigned()->nulllable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::dropIfExists('quizzes');
    }
}
