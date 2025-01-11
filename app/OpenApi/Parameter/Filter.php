<?php

namespace App\OpenApi\Parameter;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Filter extends OA\Parameter
{
    public function __construct(string $name, mixed $example, ?string $column = null, ?string $description = null)
    {
        if (! is_array($example)) {
            return $this->default($name, $example, $column, $description);
        }

        if (isset($example['min']) || isset($example['max'])) {
            return $this->minmax($name, $example, $column, $description);
        }

        $this->array($name, $example, $column, $description);
    }

    protected function minmax(string $name, array $example, ?string $column = null, ?string $description = null): void
    {
        parent::__construct(
            parameter: "filter-$name",
            name: 'filter['.($column ?? $name).'][]',
            description: $description,
            in: 'query',
            required: false,
            schema: new OA\Schema(
                type: 'array',
                items: new OA\Items(
                    type: gettype(head($example))
                )
            ),
            example: $example
        );
    }

    protected function array(string $name, array $example, ?string $column = null, ?string $description = null): void
    {
        $example = $this->example($example);

        parent::__construct(
            parameter: "filter-$name",
            name: 'filter['.($column ?? $name).'][]',
            description: $description,
            in: 'query',
            required: false,
            schema: new OA\Schema(
                type: 'array',
                items: new OA\Items(type: gettype($example[0]))
            ),
            example: $example
        );
    }

    protected function default(string $name, mixed $example, ?string $column = null, ?string $description = null): void
    {
        $example = $this->example($example);

        parent::__construct(
            parameter: "filter-$name",
            name: 'filter['.($column ?? $name).']',
            description: $description,
            in: 'query',
            required: false,
            schema: new OA\Schema(type: gettype($example)),
            example: $example
        );
    }

    protected function example(mixed $var)
    {
        if ($var instanceof \UnitEnum) {
            $var = $var->value;
        }

        return $var;
    }
}
