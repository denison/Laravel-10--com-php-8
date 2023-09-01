<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummySeeder extends Seeder
{
    private $loop = 300;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        // try{

        //     // Companies
        //     $companies = [
        //         [
        //             'holding_id'    => 1,
        //             'name'          => 'Café do João',
        //             'email'         => 'cafedojoao@teste.com',
        //             'photo'         => 'https://picsum.photos/500',
        //             'document'      => '00.000.987/6543-21',
        //             'phone'         => '(09) 8765-4321',
        //             'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //             'zipcode'       => '37500-050',
        //             'address'       => 'Rua Coronel Renno',
        //             'number'        => '4',
        //             'neighborhood'  => 'Centro',
        //             'city'          => 'Itajubá',
        //             'state'         => 'MG',
        //             'latitude'      => -22.42268064,
        //             'longitude'     => -45.45240326,
        //             'is_active'     => true,
        //             'slug'          => "--",
        //             'created_at'    => $currentTimestamp,
        //             'updated_at'    => $currentTimestamp,
        //         ],
        //         [
        //             'holding_id'   => 1,
        //             'name'         => 'Padaria Irmãos ABC',
        //             'email'        => 'contato@irmaosabc.com',
        //             'photo'        => 'https://picsum.photos/500',
        //             'document'     => '00.000.987/6543-22',
        //             'phone'        => '(09) 8765-4321',
        //             'description'  => 'A melhor da região!',
        //             'zipcode'      => '37500-050',
        //             'address'      => 'Rua Coronel Renno',
        //             'number'       => '4',
        //             'neighborhood' => 'Centro',
        //             'city'         => 'Itajubá',
        //             'state'        => 'MG',
        //             'latitude'     => -22.42268064,
        //             'longitude'    => -45.45240326,
        //             'is_active'     => true,
        //             'slug'          => "---",
        //             'created_at'   => $currentTimestamp,
        //             'updated_at'   => $currentTimestamp,
        //         ],
        //         [
        //             'holding_id'   => 1,
        //             'name'         => 'Mercado Guanabara',
        //             'email'        => 'mercadoguanabara@spoten.app',
        //             'photo'        => 'https://picsum.photos/500',
        //             'document'     => '24.632.432/0001-83',
        //             'phone'        => '(67) 3247-4325',
        //             'description'  => 'A melhor da região!',
        //             'zipcode'      => '37500-050',
        //             'address'      => 'Rua Coronel Renno',
        //             'number'       => '4',
        //             'neighborhood' => 'Centro',
        //             'city'         => 'Itajubá',
        //             'state'        => 'MG',
        //             'latitude'     => -22.42268064,
        //             'longitude'    => -45.45240326,
        //             'is_active'     => true,
        //             'slug'          => "----",
        //             'created_at'   => $currentTimestamp,
        //             'updated_at'   => $currentTimestamp,
        //         ]
        //     ];
        //     \DB::table('companies')->insert($companies);
        // }catch(\Exception $e){
        //     dd($e);
        // }

        // Album
        // $company = Company::find(1);
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');

        // $company = Company::find(2);
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');

        // $company = Company::find(3);
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');
        // $company->addMediaFromUrl('https://picsum.photos/500')->toMediaCollection('album');

        // // Questions
        // factory(\App\Models\Question::class, 10)->create();
        // factory(\App\Models\Answer::class, 30)->create();

        // Users
        // $users = [
        //     [
        //         'holding_id'        => 1,
        //         'name'              => 'Gestor Spoten',
        //         'surname'           => '1',
        //         'email'             => 'gestor@spoten.com',
        //         'password'          => bcrypt('123456'),
        //         'gender'            => mt_rand(0,1)? "male" : "female",
        //         'is_active'         => true,
        //         'accepted_mails'    => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'phone'             => "1223322323",
        //         'photo'             => '',
        //         'email_verified_at' => $currentTimestamp,
        //         'created_at'        => $currentTimestamp,
        //         'updated_at'        => $currentTimestamp,
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid()
        //     ],
        //     [
        //         'holding_id'        => 1,
        //         'name'              => 'Gestor Açaí da Maria',
        //         'surname'           => '1',
        //         'email'             => 'acaidamaria@teste.com',
        //         'password'          => bcrypt('123456'),
        //         'gender'            => mt_rand(0,1)? "male" : "female",
        //         'is_active'         => true,
        //         'accepted_mails'    => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'phone'             => "1223322323",
        //         'photo'             => '',
        //         'email_verified_at' => $currentTimestamp,
        //         'created_at'        => $currentTimestamp,
        //         'updated_at'        => $currentTimestamp,
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid()
        //     ],
        //     [
        //         'holding_id'        => 1,
        //         'name'              => 'Gestor Café do João',
        //         'surname'           => '1',
        //         'email'             => 'cafedojoao@teste.com',
        //         'password'          => bcrypt('123456'),
        //         'gender'            => mt_rand(0,1)? "male" : "female",
        //         'is_active'         => true,
        //         'accepted_mails'    => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'phone'             => "1223322323",
        //         'photo'             => '',
        //         'email_verified_at' => $currentTimestamp,
        //         'created_at'        => $currentTimestamp,
        //         'updated_at'        => $currentTimestamp,
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid()
        //     ]
        // ];
        
        // Roles
        // $usersRoles = [
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.MANAGER.id'),
        //         'model_id'   => 51
        //     ],
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.COMPANY.id'),
        //         'model_id'   => 52
        //     ],
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.COMPANY.id'),
        //         'model_id'   => 53
        //     ]
        // ];
        
        // \DB::table('users')->insert($users);
        // \DB::table('model_has_roles')->insert($usersRoles);

        // $clients_users = [
        //     [
        //         'holding_id' => 1,
        //         'name' => "Ciente 1",
        //         'email' => "cliente1@pando.com",
        //         'password' => bcrypt('123456'),
        //         'phone' => "3434344343",
        //         'gender' =>  mt_rand(0, 1) ? 'male' : 'female',
        //         "zipcode" => "11347-010",
        //         "address" => "Rua Ibrahin Abdalla Set El Banat",
        //         "number" => "50",
        //         "neighborhood" => "Jardim Rio Branco",
        //         "city" => "São Vicente",
        //         "state" => "SP",
        //         "complement" => "Casa",
        //         'photo'             => '',
        //         'is_active' => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'email_verified_at' => now(),
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid(),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'holding_id' => 1,
        //         'name' => "Ciente 3",
        //         'email' => "cliente3@pando.com",
        //         'password' => bcrypt('123456'),
        //         'phone' => "3434344343",
        //         'gender' =>  mt_rand(0, 1) ? 'male' : 'female',
        //         "zipcode" => "11347-010",
        //         "address" => "Rua Ibrahin Abdalla Set El Banat",
        //         "number" => "50",
        //         "neighborhood" => "Jardim Rio Branco",
        //         "city" => "São Vicente",
        //         "state" => "SP",
        //         "complement" => "Casa",
        //         'photo'             => '',
        //         'is_active' => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'email_verified_at' => now(),
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid(),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'holding_id' => 1,
        //         'name' => "Ciente 2",
        //         'email' => "cliente2@pando.com",
        //         'password' => bcrypt('123456'),
        //         'phone' => "3434344343",
        //         'gender' =>  mt_rand(0, 1) ? 'male' : 'female',
        //         "zipcode" => "11347-010",
        //         "address" => "Rua Ibrahin Abdalla Set El Banat",
        //         "number" => "50",
        //         "neighborhood" => "Jardim Rio Branco",
        //         "city" => "São Vicente",
        //         "state" => "SP",
        //         "complement" => "Casa",
        //         'photo'             => '',
        //         'is_active' => true,
        //         'accepted_sms'      => true,
        //         'accepted_pushs'    => true,
        //         'accepted_mails'    => true,
        //         'email_verified_at' => now(),
        //         'birth_date'        => Carbon::today()->subDays(rand(0, 36500)),
        //         'uuid'              => uniqid(),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
            
        // ];
        
        // \DB::table('users')->insert($clients_users);

        // $usersRoles = [
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.CLIENT.id'),
        //         'model_id'   => 54
        //     ],
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.CLIENT.id'),
        //         'model_id'   => 55
        //     ],
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.CLIENT.id'),
        //         'model_id'   => 56
        //     ]
        // ];

        // foreach($users_factory as $usr){
        //     dd($usr['id'], $usr);
        //     try{
        //         $usersRoles[] =
        //         [
        //             'model_type' => 'App\Models\User',
        //             'role_id'    => config('enums.roles.CLIENT.id'),
        //             'model_id'   => $usr->id
        //         ];

        //     }catch(\Exception $e){
        //         dd($e, $usr);
        //     }
        // }

        // $qnt = rand(10, 15)*$this->loop;
        // factory(\App\Models\User::class, $qnt)->create()->each(function ($user) use (&$usersRoles) {
        //     $usersRoles[] =
        //     [
        //         'model_type' => 'App\Models\User',
        //         'role_id'    => config('enums.roles.CLIENT.id'),
        //         'model_id'   => $user->id
        //     ];
        // });

        // \DB::table('model_has_roles')->insert($usersRoles);
        

        // User company
        // $userCompany = [
        //     [
        //         'user_id'    => 54,
        //         'company_id' => 5,
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'user_id'    => 54,
        //         'company_id' => 7,
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'user_id'    => 54,
        //         'company_id' => 8,
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ],
        //     [
        //         'user_id'    => 54,
        //         'company_id' => 9,
        //         'created_at' => $currentTimestamp,
        //         'updated_at' => $currentTimestamp,
        //     ]
        // ];
        // \DB::table('company_employee')->insert($userCompany);
        
        // foreach ($userCompany as $company_owner)
        // {
        //     $company = Company::find($company_owner['company_id']);
        //     $company->user_id = $company_owner['user_id'];
        //     $company->save();
        // }

        // Applications
        // $applications = [
        //     [
        //         'company_id'  => 1,
        //         'level_id'    => 1,
        //         'created_at'  => $currentTimestamp,
        //         'updated_at'  => $currentTimestamp,
        //     ],
        //     [
        //         'company_id'  => 2,
        //         'level_id'    => 1,
        //         'created_at'  => $currentTimestamp,
        //         'updated_at'  => $currentTimestamp,
        //     ],
        //     [
        //         'company_id'  => 3,
        //         'level_id'    => 1,
        //         'created_at'  => $currentTimestamp,
        //         'updated_at'  => $currentTimestamp,
        //     ],
        // ];
        // \DB::table('applications')->insert($applications);

        // $subscriptions = [
        //     [
        //         'company_id'          => 5,
        //         'name'                => 'Guanabara #VIP',
        //         'description'         => 'Clube com beneficios exclusivos para nossos clientes.',
        //         'card_image'          => 'http://www.hostcgs.com.br/hostimagem/images/442guanabara.png',
        //         'value'               => 100,
        //         'created_at'          => $currentTimestamp,
        //         'updated_at'          => $currentTimestamp,
        //     ],
        //     [
        //         'company_id'          => 7,
        //         'name'                => 'Clube do Açai',
        //         'description'         => 'Clube com beneficios exclusivos para nossos clientes.',
        //         'card_image'          => 'http://www.hostcgs.com.br/hostimagem/images/847card_acai.jpg',
        //         'value'               => 100,
        //         'created_at'          => $currentTimestamp,
        //         'updated_at'          => $currentTimestamp,
        //     ],
        //     [
        //         'company_id'          => 8,
        //         'name'                => 'Shell Protect',
        //         'description'         => 'Clube com beneficios exclusivos para nossos clientes.',
        //         'card_image'          => 'http://www.hostcgs.com.br/hostimagem/images/569SHELL_CARD.jpg',
        //         'value'               => 100,
        //         'created_at'          => $currentTimestamp,
        //         'updated_at'          => $currentTimestamp,
        //     ],
        //     [
        //         'company_id'          => 8,
        //         'name'                => 'Shell Basic',
        //         'description'         => 'Clube com beneficios exclusivos para nossos clientes.',
        //         'card_image'          => 'http://www.hostcgs.com.br/hostimagem/images/970SHELL_CARD_basic.jpg',
        //         'value'               => 100,
        //         'created_at'          => $currentTimestamp,
        //         'updated_at'          => $currentTimestamp,
        //     ],

        // ];
        // \DB::table('subscriptions')->insert($subscriptions);

        // $subscriptionBenefits = [
        //     [
        //         'subscription_id' => 1,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Tudo Pela Metade',
        //         'description'     => 'Economize sempre que visitar nossa casa',
        //         'footer'          => 'Tenha 50% off em qualquer prato',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 1,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Vale o Ano Todo',
        //         'description'     => 'Assinou uma vez, você tem 365 dias de VIP',
        //         'footer'          => 'Você pode escolher a renovação automática',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 2,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Tudo em Dobro',
        //         'description'     => 'Todos os acompanhamentos sao em dobro',
        //         'footer'          => 'Pra pedir aquela mega barca com os amigos',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 2,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Assinatura Mensal',
        //         'description'     => 'Facilitamos para você, válido por 30 dias',
        //         'footer'          => 'Você pode escolher a renovação automática',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 3,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Viaje com Segurança',
        //         'description'     => 'Total cobertura contra acidentes',
        //         'footer'          => 'Válido em todo território nacional',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 3,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Assinatura Semestral',
        //         'description'     => 'A cada semestre você escolhe se quer contiuar',
        //         'footer'          => 'Você pode escolher a renovação automática',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 4,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Viaje com Segurança',
        //         'description'     => 'Cobertura contra roubos e furtos',
        //         'footer'          => 'Válido em todo estado.',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'subscription_id' => 4,
        //         'holding_id'      => 1,
        //         'tittle'          => 'Assinatura Anual',
        //         'description'     => 'Pague uma vez e não se preocupe mais',
        //         'footer'          => 'Você pode escolher a renovação automática',
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        // ];
        // \DB::table('subscription_benefits')->insert($subscriptionBenefits);
        
        // $now = Carbon::now();
        // $userSubscription = [
        //     [
        //         'user_id'         => 55,
        //         'subscription_id' => 3,
        //         'expiration_date'        => $now->add('30 day'),
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'user_id'         => 56,
        //         'subscription_id' => 3,
        //         'expiration_date'        => $now->add('30 day'),
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ],
        //     [
        //         'user_id'         => 56,
        //         'subscription_id' => 2,
        //         'expiration_date'        => $now->add('30 day'),
        //         'created_at'      => $currentTimestamp,
        //         'updated_at'      => $currentTimestamp,
        //     ]
        // ];


        \DB::table('subscription_member')->insert($userSubscription);
    }
}
