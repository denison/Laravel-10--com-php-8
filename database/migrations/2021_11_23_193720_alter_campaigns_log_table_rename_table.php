<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableRenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('campaigns_log', 'communication_dispatches');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * @todo Não ser porque ta com essa tabela, se ela existir já, eu renomeio como backup
         */
        if (Schema::hasTable('campaigns_log'))
        {
            Schema::rename('campaigns_log', 'campaigns_log_backup');
        }

        Schema::rename('communication_dispatches', 'campaigns_log');
    }
}
