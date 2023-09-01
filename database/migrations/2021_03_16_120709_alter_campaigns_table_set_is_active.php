<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableSetIsActive extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::table
        (
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->boolean('is_active')->default(false)->change();
            }
        );
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::table
        (
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->boolean('is_active')->default()->change();
            }
        );
    }
}
