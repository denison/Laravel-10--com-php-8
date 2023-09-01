<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHoldingsTableSetDefaultSpotenFeeCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('holdings')
            ->update(
                [
                    'default_spoten_fee_credit' => '
                        {
                            "1x": 0.71,
                            "2x": 0.51,
                            "3x": 0.51,
                            "4x": 0.51,
                            "5x": 0.51,
                            "6x": 0.51,
                            "7x": 0.51,
                            "8x": 0.51,
                            "9x": 0.51,
                            "10x": 0.51,
                            "11x": 0.51,
                            "12x": 0.51
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
