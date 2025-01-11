<?php

namespace App\OpenApi\Parameter;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class With extends OA\Parameter
{
    public function __construct(array $relations)
    {
        parent::__construct(
            name: 'with[]',
            description: 'Загрузить зависимости модели',
            in: 'query',
            schema: new OA\Schema(type: 'array', items: new OA\Items(type: 'string')),
            example: $relations
        );
    }
}
