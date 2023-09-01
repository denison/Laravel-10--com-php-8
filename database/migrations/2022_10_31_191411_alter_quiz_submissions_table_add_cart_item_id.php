<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuizSubmissionsTableAddCartItemId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_submissions', function (Blueprint $table) 
        {
            $table->integer('cart_item_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('cart_item_id')->references('id')->on('cart_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_submissions', function (Blueprint $table) 
        {
            $table->dropForeign(['cart_item_id']);
            $table->dropColumn('cart_item_id');
        });
    }
}
