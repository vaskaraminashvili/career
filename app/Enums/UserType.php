<?php

namespace App\Enums;

enum UserType: string
{
    case ADMIN = 'admin';
    case COMPANY = 'company';
    case ORGANIZATION = 'organization';
    case STUDENT = 'student';
}
