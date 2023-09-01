<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinksUtilsToHoldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->string('link_help_center')->nullable();
            $table->string('link_help_chat')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_whatsapp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->dropColumn('link_help_center');
            $table->dropColumn('link_help_chat');
            $table->dropColumn('link_instagram');
            $table->dropColumn('link_facebook');
            $table->dropColumn('link_whatsapp');
        });
    }
}
