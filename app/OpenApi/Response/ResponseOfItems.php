<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class ResponseOfItems extends OA\Response
{
    public function __construct(string $response, string $itemClass, string $description = ' ')
    {
        $ref = fn ($c) => '#/components/schemas/'.basename(str_replace('\\', '/', $c));

        parent::__construct(
            response: $response,
            description: $description,
            content: [new OA\JsonContent(allOf: [new OA\Schema(
                type: 'array',
                items: new OA\Items(ref: $ref($itemClass)),
            )])],
        );
    }
}
