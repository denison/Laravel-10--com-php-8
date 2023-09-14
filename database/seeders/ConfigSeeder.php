<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PlanSeeder;


class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         /**
     * Run the database seeds.
     *
     * @return void
     */
    
        $currentTimestamp = \DB::raw('CURRENT_TIMESTAMP');

        // // Roles
        // $roles = array_map(['App\Helpers\Functions', 'addTimestamp'], array_values(config('enums.roles')));
        // \DB::table('roles')->insert($roles);

        // // SuperAdmin
        // $superAdmin = [
        //     [
        //         'uuid'              => uniqid(),
        //         'name'              => 'Super',
        //         'surname'           => 'Admin',
        //         'email'             => 'super@admin.com',
        //         'password'          => bcrypt('123456'),
        //         'is_active'         => true,
        //         'phone'             => '-',
        //         'photo'             => "-",
        //         'email_verified_at' => $currentTimestamp,
        //         'created_at'        => $currentTimestamp,
        //         'updated_at'        => $currentTimestamp,
        //     ],
        // ];
        // \DB::table('users')->insert($superAdmin);

        // // SuperAdmin Role
        // $roleSuperAdmin = [
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.SUPER_ADMIN.id'),
        //         'model_id'   => 1
        //     ],
        // ];
        // \DB::table('model_has_roles')->insert($roleSuperAdmin);

        // $this->call(PlanSeeder::class);

        // // Holding
        // $holdings = [
        //     [
        //         'name'        => 'Spoten',
        //         'description' => 'Supporting local businesses is easy and rewarding with Spoten.',
        //         'created_at'  => $currentTimestamp,
        //         'updated_at'  => $currentTimestamp,
        //         'default_company_plan_id' => \DB::table('plans')->where('plans.value', 0)->inRandomOrder()->first()->id,
        //     ],
        // ];
        // // \DB::table('holdings')->insert($holdings);

        // $this->call(CompanyCategorySeeder::class);

        // // Payment Status
        // $status = 
        // [
        //     [
        //         'id'         => 1,
        //         'name'       => 'Processando',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'id'         => 2,
        //         'name'       => 'Aprovado',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'id'         => 3,
        //         'name'       => 'Recusado',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        // ];
        // \DB::table('status_payments')->insert($status);

        // // Levels
        // $levels = [
        //     [
        //         'holding_id'          => 1,
        //         'name'                => 'Configuração Inicial - 5% Cashback',
        //         'voucher_value'       => 100,
        //         'cashback_percentage' => 5,
        //         'created_at'          => $currentTimestamp,
        //         'updated_at'          => $currentTimestamp,
        //         'base' => true
        //     ],
        // ];
        // \DB::table('levels')->insert($levels);

        // // Feedback Types
        // $feedbackTypes = 
        // [
        //     [
        //         'holding_id' => 1,
        //         'name'       => 'Qualidade',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'holding_id' => 1,
        //         'name'       => 'Atendimento',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'holding_id' => 1,
        //         'name'       => 'Custo x Benefício',
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ]
        // ];
        // \DB::table('feedback_types')->insert($feedbackTypes);
    }
}
