<?php

namespace App\Data\Auth;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema(required: ['email', 'password'])]
class Login extends Data
{
    #[Property(example: 'johndoe@example.com')]
    public string $email;

    #[Property(example: 'password')]
    public string $password;
}
