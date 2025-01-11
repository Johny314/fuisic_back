<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;
use OpenApi\Attributes\Schema;

#[Schema]
class Ok extends OA\Schema
{
    public function __construct()
    {
        parent::__construct(
            description: 'HTTP/1.1 200 с пустым телом',
            type: 'object'
        );
    }
}
