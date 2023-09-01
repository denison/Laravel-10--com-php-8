<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFeedbacksTableSetOrderId extends Migration
{
    public function up()
    {
        Schema::table
        (
            'feedbacks', 
            function (Blueprint $table) 
            {
                $table -> dropForeign(['order_id']);
                $table -> foreign('order_id') -> references('id') -> on('orders') -> onDelete('cascade');
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
        Schema::table
        (
            'feedbacks', 
            function (Blueprint $table) 
            {
                $table -> dropForeign(['order_id']);
                $table -> foreign('order_id') -> references('id') -> on('orders') -> onDelete('restrict');
            }
        );
    }
}
