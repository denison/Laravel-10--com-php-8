<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try {
            Schema::table('surveys', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn(['user_id']);
            });
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_02_01_172455_add_user_id_to_survey_table): '.$error->getMessage());
        }
    }
}
