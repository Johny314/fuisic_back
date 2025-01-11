<?php

namespace App\OpenApi\Response;

use OpenApi\Attributes as OA;
use OpenApi\Attributes\Schema;

#[Schema]
class NotFound extends OA\Schema
{
    public function __construct()
    {
        parent::__construct(
            description: 'Один из элементов, указанных в URL, не найден',
            type: 'object',
        );
    }
}
