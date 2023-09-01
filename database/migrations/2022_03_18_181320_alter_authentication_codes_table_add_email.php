<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAuthenticationCodesTableAddEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authentication_codes', function (Blueprint $table) 
        {
            $table->string('email')->after('phone')->nullable();
            $table->string('phone')->nullable(true)->change();
        });

        \DB::unprepared('delete from authentication_codes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::unprepared('delete from authentication_codes');
        
        Schema::table('authentication_codes', function (Blueprint $table) 
        {
            $table->dropColumn('email');
            $table->string('phone')->nullable(false)->change();
        });
    }
}
