<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVouchersTableRedeemedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('
            update 
                vouchers 
                inner join payments 
                    on vouchers.id = payments.used_voucher_id 
            set 
                vouchers.redeemed_at = payments.created_at
            where
                payments.status_payment_id in (1, 2)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //$this->up();
    }
}
