<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('email_title')->nullable();
            $table->string('email_body')->nullable();
            $table->string('push_title')->nullable();
            $table->string('push_body')->nullable();
            $table->string('whatsapp_body')->nullable();
            $table->string('sms_body')->nullable();
            $table->string('voucher_description')->nullable();
            $table->date('voucher_expires')->nullable();
            $table->decimal('voucher_value', 10, 2)->nullable();
            $table->boolean('is_active');
            $table->boolean('keep_alive');
            $table->string('sending_frequency');
            $table->integer('scheduled_hour');
            $table->string('scheduled_days');
            $table->json('audience_segmentation');
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
        Schema::drop('campaigns');
    }
}
