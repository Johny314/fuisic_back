<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class IndexResponse extends OA\Response
{
    public function __construct(array|string $classes, string $description = ' ')
    {
        $ref = fn ($c) => '#/components/schemas/'.basename(str_replace('\\', '/', $c));

        parent::__construct(
            response: 200,
            description: $description,
            content: new OA\JsonContent(
                type: 'array',
                items: is_array($classes)
                    ? new OA\Items(oneOf: collect($classes)
                        ->map(fn ($c) => new OA\Schema(ref: $ref($c)))
                        ->toArray())
                    : new OA\Items(ref: $ref($classes))
            ),
        );
    }
}
