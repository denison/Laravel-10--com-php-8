<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuizzesTableAddProductId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) 
        {
            $table->integer('product_id')->unsigned()->nullable()->after('subscription_id');
            $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) 
        {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
}
