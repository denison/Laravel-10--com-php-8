<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHoldingsTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        // @todo, AContece o erro caso não consiga deletar a tabela users
        try {
            Schema::dropIfExists('holdings');
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2020_07_30_111415_create_holdings_table): '.$error->getMessage());
        }
    }
}
