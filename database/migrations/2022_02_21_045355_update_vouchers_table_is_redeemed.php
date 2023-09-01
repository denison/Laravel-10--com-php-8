<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVouchersTableIsRedeemed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$this->down();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('
            update 
                vouchers 
                inner join payments 
                    on vouchers.id = payments.used_voucher_id 
            set 
                vouchers.is_redeemed = true
            where
                payments.status_payment_id in (1, 2)
        ');
    }
}
