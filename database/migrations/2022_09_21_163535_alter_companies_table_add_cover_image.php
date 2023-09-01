<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddCoverImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'companies', 
            function (Blueprint $table) 
            {
                $table->string('cover_image')->nullable()->after('photo');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'companies', 
            function (Blueprint $table) 
            {
                $table->dropColumn('cover_image');
            }
        );
    }
}
