<?php

namespace App\OpenApi\Request;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class RequestIds extends OA\RequestBody
{
    public function __construct()
    {
        parent::__construct(
            required: true,
            content: new OA\JsonContent(properties: [new OA\Property(
                property: 'ids',
                type: 'array',
                items: new OA\Items(type: 'integer'),
                example: ['nanoId78', 'YvDnG1D9', 'bCbf4djh']
            )])
        );
    }
}
