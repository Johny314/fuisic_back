<?php

namespace App\Data\Filters;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema]
class Difficulty extends Data
{
    #[Property(example: 'Легкая')]
    public string $name;
}
