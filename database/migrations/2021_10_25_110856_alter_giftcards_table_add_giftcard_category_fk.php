<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddGiftcardCategoryFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giftcards', function (Blueprint $table) {
            $table->integer('giftcard_category_id')->unsigned()->nullable()->after('company_id');
            $table->foreign('giftcard_category_id')->references('id')->on('giftcard_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giftcards', function (Blueprint $table) {
            $table->dropForeign(['giftcard_category_id']);
            $table->dropColumn('giftcard_category_id');
        });
    }
}
