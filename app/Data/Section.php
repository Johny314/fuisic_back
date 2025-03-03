<?php

namespace App\Data;

use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema(required: ['name'])]
class Section extends Data
{
    #[Property(readOnly: true, example: '1')]
    public ?int $id;

    #[Property(example: 'Math')]
    public ?string $name;
}
