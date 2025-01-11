<?php

namespace App\OpenApi\Request;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class RequestBody extends OA\RequestBody
{
    public function __construct(string $class)
    {
        $ref = fn ($c) => '#/components/schemas/'.basename(str_replace('\\', '/', $c));

        parent::__construct(
            required: true,
            content: new OA\JsonContent(ref: $ref($class))
        );
    }
}
