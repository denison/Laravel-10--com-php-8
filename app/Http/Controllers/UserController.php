<?php

namespace App\Http\Controllers;

use App\Enum\RoleName;
use Illuminate\Http\Request;

use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

use DB;

class UserController extends Controller
{
     /** @var  UserRepository */
     private $userRepository;

     public function __construct(UserRepository $userRepo)
     {
         $this->userRepository = $userRepo;
     }

     public function index(){
        return view('users.index');
     }

     public function show(){

     }

     public function clients()
    {
        return view('users.clients');
    }

    public function getUsers(){
        $users = User::select(
            "users.name",
            "users.email",
            "users.phone",
            "users.whatsapp",
            
            DB::raw("(
                SELECT roles.display_name
                FROM roles
                LEFT JOIN model_has_roles ON model_has_roles.role_id = roles.id
                WHERE model_has_roles.model_id = users.id
            ) as readable_role_name"),
            \DB::raw("(CASE
                        WHEN users.is_active=true  THEN 'Sim'
                        WHEN users.is_active=false THEN 'Não'
                        ELSE NULL
                    END) as readable_is_active"),
            // \DB::raw("CONCAT(users.name, ' ', users.surname) as full_name"),
            \DB::raw("DATE_FORMAT(users.birth_date, '%d/%m/%Y') as readable_birth_date")
        );

        return DataTables::of($users)
        ->make(true);
    }
 
    public function getClients(){
        $users = User::select(
            "users.name",
            "users.email",
            "users.phone",
            "users.whatsapp",
            /*
            \DB::raw("(
                        SELECT roles.display_name
                        FROM roles
                        LEFT JOIN model_has_roles ON model_has_roles.role_id = roles.id
                        WHERE model_has_roles.model_id = users.id
                    ) as readable_role_name"),
            */
            
            \DB::raw("(CASE
                        WHEN users.is_active=true  THEN 'Sim'
                        WHEN users.is_active=false THEN 'Não'
                        ELSE NULL
                    END) as readable_is_active"),
            // \DB::raw("CONCAT(users.name, ' ', users.surname) as full_name"),
            \DB::raw("DATE_FORMAT(users.birth_date, '%d/%m/%Y') as readable_birth_date")
        )->join("model_has_roles", "model_has_roles.model_id", 'users.id')
        ->where("model_has_roles.role_id", RoleName::from(strval(RoleName::CLIENT))->getId());

        return DataTables::of($users)
        ->editColumn('name', function(User $user) {
            return !is_null($user->whatsapp) ?  $user->name. " <a href='https://wa.me/$user->whatsapp' target='_blank' style='color: #4bcb4b;'> <i class='fab fa-whatsapp-square'></i> </a>" : $user->name;
        })
        ->rawColumns(['name'])
        ->make(true);
    }
}
