<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Permission;

class InsertPermissionsTableEmployeePermissions extends Migration
{
    // public $permissions = [
    //     'customers', 
    //     'products', 
    //     'giftcards', 
    //     'feedbacks', 
    //     'employees', 
    //     'payments', 
    //     'financial', 
    //     'cashback', 
    //     'vouchers', 
    //     'subscriptions', 
    //     'campaigns', 
    //     'campaigns_automatic', 
    //     'modules', 
    //     'disclose', 
    //     'reports', 
    //     'invoices',
    // ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // foreach ($this->permissions as $permission) Permission::create(['name' => $permission, 'guard_name' => 'company_positions']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Permission::whereIn('name', $this->permissions)->delete();
    }
}
