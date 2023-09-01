<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardCategoriesTableSetNullablePhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giftcard_categories', function (Blueprint $table) {
            $table->string('photo')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giftcard_categories', function (Blueprint $table) {
            $table->string('photo')->nullable(false)->change();
        });
    }
}
