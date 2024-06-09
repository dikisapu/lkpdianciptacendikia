<?php

namespace App\Enums;

enum UserRolesEnum: string
{
    case ADMIN = 'Admin';
    case MEMBER = 'Member';
    case INSTRUKTUR = 'Instruktur';

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function isMember(): bool
    {
        return $this === self::MEMBER;
    }



//    public function getLabelText(): string
//    {
//        return match ($this) {
//            self::ADMIN => 'Administrator',
//            self::EMPLOYE => 'Employee',
//            self::SUPERVISOR => 'Supervisor',
//            self::HRM => 'HRM',
//            self::MANAGER => 'Manager',
//            self::GM => 'GM',
//        };
//    }
}
