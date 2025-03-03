<?php

namespace App\Data;

use App\Enums\UserType;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema(required: ['name', 'email', 'user_type'])]
class User extends Data
{
    #[Property(readOnly: true, example: '1')]
    public ?int $id;

    #[Property(example: 'John Doe')]
    public string $name;

    #[Property(example: 'johndoe@example.com')]
    public string $email;

    #[Property(example: 'password')]
    public string $password;

    #[Property(example: 'admin')]
    public ?UserType $user_type;

    #[Property(readOnly: true, example: '2024-01-01 12:00:00')]
    public ?string $email_verified_at;
}
