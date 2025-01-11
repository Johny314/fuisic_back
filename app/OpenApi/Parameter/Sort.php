<?php

namespace App\OpenApi\Parameter;

use Illuminate\Support\Arr;
use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Sort extends OA\Parameter
{
    public function __construct(array|string $fields)
    {
        $fields = implode(', ', Arr::wrap($fields));
        $example = '-'.$fields;

        parent::__construct(
            name: 'sort',
            description: "Доступные поля: $fields

Для сортировки в обратную сторону добавьте префикс '-'
",
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string'),
            example: $example
        );
    }
}
