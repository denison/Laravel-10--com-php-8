<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureUpdatePaymentsTableSetGatewaySplitFee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('
            update
                payments
            set
                payments.gateway_transaction_id = null,
                payments.gateway_split_fee = null
            where
                payments.gateway_transaction_id = 0
        ');

        \DB::unprepared('
            update
                payments
            set
                payments.spoten_fee = 100,
                payments.gateway_split_fee = 100
            where
                payments.gateway_transaction_id is not null
                and (
                    payments.balance
                    or payments.plan_id is not null
                )
        ');

        \DB::unprepared('
            update
                payments
            set
                payments.gateway_split_fee = null
            where
                payments.gateway_split_fee = 0
        '); 

        $this->down();
        \DB::unprepared('
            create procedure 
                update_payments_table_set_gateway_split_fee()
            begin
                declare payment_id integer;
                declare payment_used_voucher_id integer;
                declare payment_value double(10, 2);
                declare payment_spoten_fee double(10, 2);
                declare payment_spoten_fee_fixed_value double(10, 2);
                declare payment_installment_fee double(10, 2);
                declare payment_customer_pay_installment_fees integer;
                
                declare discount_value double(10, 2);
                declare net_value double(10, 2);
                declare final_value double(10, 2);
                
                declare spoten_fee double(10, 2);
                declare installment_fee double(10, 2);
                declare gateway_split_fee double(10, 2);
                
                declare finished integer default 0;
                declare
                    select_payments
                    cursor for
                        select
                            payments.id,
                            payments.used_voucher_id,
                            payments.value,
                            payments.spoten_fee,
                            payments.spoten_fee_fixed_value,
                            payments.installment_fee,
                            payments.customer_pay_installment_fees
                        from
                            payments
                        where
                            payments.gateway_transaction_id is not null
                            and payments.gateway_split_fee is null;
                declare continue handler for not found set finished = 1;
                
                open select_payments;
                
                repeat
                    fetch 
                        select_payments 
                    into 
                        payment_id,
                        payment_used_voucher_id,
                        payment_value,
                        payment_spoten_fee,
                        payment_spoten_fee_fixed_value,
                        payment_installment_fee,
                        payment_customer_pay_installment_fees;
                    
                    if not finished then
                        set spoten_fee = if (payment_spoten_fee is not null, payment_spoten_fee, 0);
                        set installment_fee = if (payment_installment_fee is not null, payment_installment_fee, 0);
                            
                        set discount_value = (
                            (select if (count(vouchers.total_value) > 0, sum(vouchers.total_value), 0) from vouchers where vouchers.id = payment_used_voucher_id)
                            + (select if (count(payment_with_subscription.discount) > 0, sum(payment_with_subscription.discount), 0) from payment_with_subscription where payment_with_subscription.payment_id = payment_id)
                        );
                        set net_value = (
                            if
                            (
                                (
                                    payment_value
                                    - discount_value
                                ) > 0,
                                (
                                    payment_value
                                    - discount_value
                                ),
                                0
                            )
                        );
                        set final_value = (
                            net_value*(1 + (installment_fee/100))
                        );
                        
                        if (final_value > 0) then
                            set gateway_split_fee = round(
                                100 
                                - (
                                    (
                                        (
                                            final_value*(
                                                100 
                                                - 
                                                if
                                                (
                                                    payment_customer_pay_installment_fees,
                                                    (100 - (((1 - (spoten_fee/100))/(1 + (installment_fee/100)))*100)),
                                                    spoten_fee + installment_fee
                                                )
                                            )/100
                                        ) 
                                        - payment_spoten_fee_fixed_value
                                    )*100/final_value
                                ), 
                                2
                            );
                            
                            if (gateway_split_fee > 100) then set gateway_split_fee = 100;
                            elseif (gateway_split_fee < 0) then set gateway_split_fee = 0;
                            end if;
            
                            update 
                                payments 
                            set 
                                payments.gateway_split_fee = gateway_split_fee
                            where
                                payments.id = payment_id;
                        end if;
                    end if;
                until
                    finished
                end repeat;
                
                close select_payments;
            end
        ');
        \DB::unprepared('call update_payments_table_set_gateway_split_fee()');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::unprepared('drop procedure if exists update_payments_table_set_gateway_split_fee');
    }
}
