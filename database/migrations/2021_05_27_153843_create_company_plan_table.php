<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create
        (
            'company_plan', 
            function (Blueprint $table) 
            {
                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');

                $table->integer('plan_id')->unsigned();
                $table->foreign('plan_id')->references('id')->on('companies')->onDelete('restrict');

                $table->double('value');
                $table->double('adicional_value')->default(0);
                $table->boolean('active')->default(false);

                $table->boolean('vouchers')->default(false);
                $table->boolean('surveys')->default(false);
                $table->boolean('giftcards')->default(false);
                $table->boolean('subcriptions')->default(false);
                $table->boolean('spoten_pay')->default(false);
                $table->boolean('individual_shipments')->default(false);
                $table->boolean('scheduling_shipments')->default(false);
                
                $table->integer('customers');
                $table->double('customers_price');
                $table->integer('free_shipments');
                $table->integer('employees');

                $table->double('mail_price');
                $table->double('sms_price');
                $table->double('push_price');
                $table->double('whatsapp_price');

                $table->dateTime('expiration_date');

                $table->timestamps();
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
        Schema::dropIfExists('company_plan');
    }
}
