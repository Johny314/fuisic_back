<?php

namespace App\Data\Filters;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema]
class Classification extends Data
{
    #[Property(example: '1-4')]
    public string $name;
}
