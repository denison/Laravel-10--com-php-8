<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampaignIdToVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->integer('campaign_id')->unsigned()->nullable()->after('id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // @todo [2022-01-07 18:43:41] local.ERROR: SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP 'vouchers_campaign_id_foreign'; check that column/key exists (SQL: alter table `vouchers` drop foreign key `vouchers_campaign_id_foreign
                         //`) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42000): SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP 'vouchers_campaign_id_foreign'; check that column/key exists (SQL: alter table `vouchers` dro
                         //p foreign key `vouchers_campaign_id_foreign`)
        try {
            Schema::table('vouchers', function (Blueprint $table) {
                $table->dropForeign(['campaign_id']);
                $table->dropColumn(['campaign_id']);
            });
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_02_24_172440_add_campaign_id_to_vouchers_table): '.$error->getMessage());
        }
    }
}
