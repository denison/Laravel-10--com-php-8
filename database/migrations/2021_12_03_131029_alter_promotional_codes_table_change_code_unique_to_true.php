<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodesTableChangeCodeUniqueToTrue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotional_codes', function (Blueprint $table) 
        {
            $table->string('code')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotional_codes', function (Blueprint $table) 
        {
            $table->dropUnique('promotional_codes_code_unique');
        });
    }
}
