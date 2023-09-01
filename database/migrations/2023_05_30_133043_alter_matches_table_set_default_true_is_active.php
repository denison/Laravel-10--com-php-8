<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMatchesTableSetDefaultTrueIsActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) 
        {
            $table->boolean('is_active')->default(true)->change();
        });

        \DB::table('matches')->where('is_active', false)->update(['is_active' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) 
        {
            $table->boolean('is_active')->default(false)->change();
        });
    }
}
