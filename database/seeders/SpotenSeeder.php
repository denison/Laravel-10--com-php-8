<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SpotenSeeder extends Seeder
{
    private $loop = 300;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyCategorySeeder::class);

        $currentTimestamp = Carbon::now();

        // Users
        $users = [
            [
                'holding_id'        => 1,
                'name'              => 'Gestor Spoten',
                'surname'           => '1',
                'email'             => 'gestor@spoten.com',
                'password'          => bcrypt('123456'),
                'gender'            => mt_rand(0,1)? "male" : "female",
                'is_active'         => true,
                'email_verified_at' => $currentTimestamp,
                'created_at'        => $currentTimestamp,
                'updated_at'        => $currentTimestamp,
            ],

        ];

        // Roles
        $usersRoles = [

            [
                'model_type' => 'App\Models\User',
                'role_id'    => config('enums.roles.MANAGER.id'),
                'model_id'   => 2
            ],
            [
                'model_type' => 'App\Models\User',
                'role_id'    => config('enums.roles.COMPANY.id'),
                'model_id'   => 3
            ],
            [
                'model_type' => 'App\Models\User',
                'role_id'    => config('enums.roles.COMPANY.id'),
                'model_id'   => 4
            ]
        ];

        \DB::table('users')->insert($users);
        \DB::table('model_has_roles')->insert($usersRoles);

        /*
        // Categories
        $company_categories = [
            [
                'holding_id' => 1,
                'name'       => 'Restaurantes',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ];
        \DB::table('company_categories')->insert($company_categories);
        */
    }
}
