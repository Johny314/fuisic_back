<?php

namespace App\OpenApi\Parameter;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class PerPage extends OA\Parameter
{
    public function __construct()
    {
        parent::__construct(
            name: 'per_page',
            description: 'количество элементов на странице',
            in: 'query',
            schema: new OA\Schema(type: 'integer'),
            example: 20
        );
    }
}
