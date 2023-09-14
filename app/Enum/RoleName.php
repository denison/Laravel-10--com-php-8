<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

class RoleName extends Enum{
    const SUPER_ADMIN   = 'super_admin';
    const MANAGER       = 'manager';
    const COMPANY       = 'company';
    const EMPLOYEE      = 'employee';
    const CLIENT        = 'client';
     /**
     * Display values for the enum.
     */
    public static function labels(): array
    {
        return [
            self::SUPER_ADMIN => __('Super Admin'),
            self::MANAGER => __('Gestor'),
            self::COMPANY => __('Empresa'),
            self::EMPLOYEE => __('Funcionário'),
            self::CLIENT => __('Cliente')
        ];
    }
    
    public function getLabel(): string
    {
        return self::labels()[$this->value];
    }


    public static function id ( ) : mixed{
        return [
            self::SUPER_ADMIN => __('1'),
            self::MANAGER => __('2'),
            self::COMPANY => __('3'),
            self::EMPLOYEE => __('4'),
            self::CLIENT => __('5')
        ];
    }

    public function getId ( ) : mixed
    {
        return self::id()[$this->value];
    }
   
}

// Modos de chamar um enum
// RoleName::MANAGER -> traz o name da role
// RoleName::from(strval('company')) -> tra nome e a key
// RoleName::from(strval('super_admin'))->getLabel() -> Traz o Label
// RoleName::from(strval('super_admin'))->getId() -> Traz o ID