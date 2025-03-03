<?php

namespace App\Data;

use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema(required: ['name'])]
class Section extends Data
{
    #[Property(example: 'Math')]
    public ?string $name;
}
