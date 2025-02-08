<?php

namespace App\Enums;

enum UserType: string
{
    case admin = 'admin';
    case teacher = 'teacher';
    case student = 'student';
}
