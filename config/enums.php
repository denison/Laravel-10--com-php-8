<?php

return [

    'roles' =>
    [
        'SUPER_ADMIN' => ['id' => 1, 'name' => 'super_admin', 'display_name' => 'Super Administrador', 'guard_name' => 'web'],
        'MANAGER'     => ['id' => 2, 'name' => 'manager',     'display_name' => 'Gestor',              'guard_name' => 'web'],
        'COMPANY'     => ['id' => 3, 'name' => 'company',     'display_name' => 'Empresa',             'guard_name' => 'web'],
        'EMPLOYEE'    => ['id' => 4, 'name' => 'employee',    'display_name' => 'Funcionário',         'guard_name' => 'web'],
        'CLIENT'      => ['id' => 5, 'name' => 'client',      'display_name' => 'Cliente',             'guard_name' => 'web'],
    ],
];
