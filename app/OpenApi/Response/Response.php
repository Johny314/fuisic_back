<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Response extends OA\Response
{
    public function __construct(string $response, array|string $classes, string $description = ' ')
    {
        $ref = fn ($c) => '#/components/schemas/'.basename(str_replace('\\', '/', $c));

        parent::__construct(
            response: $response,
            description: $description,
            content: is_array($classes)
                ? new OA\JsonContent(oneOf: collect($classes)
                    ->map(fn ($c) => new OA\Schema(ref: $ref($c)))
                    ->toArray())
                : new OA\JsonContent(ref: $ref($classes)),
        );
    }
}
