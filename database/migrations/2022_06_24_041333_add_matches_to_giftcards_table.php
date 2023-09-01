<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatchesToGiftcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giftcards', function (Blueprint $table) 
        {
            $table->integer('match_id')->unsigned()->nullable()->after('is_product');
            $table->foreign('match_id')->references('id')->on('matches')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giftcards', function (Blueprint $table) 
        {
            $table->dropForeign(['match_id']);
            $table->dropColumn('match_id');
        });
    }
}
