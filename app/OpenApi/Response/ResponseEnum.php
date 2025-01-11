<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class ResponseEnum extends OA\Response
{
    public function __construct(string $response, string $enumClass, string $description = ' ')
    {
        parent::__construct(
            response: $response,
            description: $description,
            content: [new OA\JsonContent(allOf: [new OA\Schema(
                type: 'array',
                example: $enumClass::map(),
                items: new OA\Items(type: 'string'),
            )])],
        );
    }
}
