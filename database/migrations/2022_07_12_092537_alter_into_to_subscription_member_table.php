<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterIntoToSubscriptionMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $subscriptions = \DB::table('subscriptions')->where('company_id', 65)->get();

        foreach ($subscriptions as $key => $subscription) {
            $members = \DB::table('subscription_member')->where('subscription_id', $subscription->id)->update([
                'expiration_date' => \Carbon\Carbon::now(),
                'automatic_renovation' => 0,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
