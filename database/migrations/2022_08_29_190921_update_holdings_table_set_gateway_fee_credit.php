<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHoldingsTableSetGatewayFeeCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('holdings')
            ->whereNull('holdings.gateway_fee_credit')
            ->update(
                [
                    'gateway_fee_credit' => '
                        {
                            "1x": 2.39,
                            "2x": 2.59,
                            "3x": 2.59,
                            "4x": 2.59,
                            "5x": 2.59,
                            "6x": 2.59,
                            "7x": 2.59,
                            "8x": 2.59,
                            "9x": 2.59,
                            "10x": 2.59,
                            "11x": 2.59,
                            "12x": 2.59
                        }
                    ',
                ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
