<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomerTagsTableDropForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_tags', function (Blueprint $table) 
        {
            $table->dropForeign('tag_customer_tag_id_foreign');
            $table->dropForeign('tag_customer_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_tags', function (Blueprint $table) 
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->constrained('tag_customer_user_id_foreign');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade')->constrained('tag_customer_tag_id_foreign');
        });
    }
}
