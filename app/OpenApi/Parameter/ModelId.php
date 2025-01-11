<?php

namespace App\OpenApi\Parameter;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class ModelId extends OA\Parameter
{
    public function __construct(string $name, string $description)
    {
        parent::__construct(
            name: $name,
            description: $description,
            in: 'path',
            required: true,
            schema: new OA\Schema(type: 'string'),
            example: 'nanoId78'
        );
    }
}
