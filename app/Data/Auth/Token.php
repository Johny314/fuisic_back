<?php

namespace App\Data\Auth;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema()]
class Token extends Data
{
    #[Property(example: 'your-generated-token-here')]
    public string $token;
}
