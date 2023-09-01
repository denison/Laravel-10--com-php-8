<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColorToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn('color', 'color_primary');
            $table->string('color_secondary')->nullable(true)->after('color');
            $table->string('color_tertiary')->nullable(true)->after('color_secondary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn('color_primary', 'color');
            $table->dropColumn('color_secondary');
            $table->dropColumn('color_tertiary');
        });
    }
}
