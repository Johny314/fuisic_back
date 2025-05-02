<?php

namespace App\Data\Test;

use App\Data\Data;
use App\OpenApi\Property;
use Illuminate\Support\Collection;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes;

#[Schema]
class Answers extends Data
{
    #[Property(example: '1')]
    public int $time;

    #[Property(
        type: 'array',
        items: new Attributes\Items(ref: '#/components/schemas/Answer'),
    )]
    public array $answers;
}
