<?php

namespace App\OpenApi;

use App\Enums\Arrayable;

enum Tag: string
{
    use Arrayable;

    case example = 'example';

    public function label(): string
    {
        return match ($this) {
            self::example => 'Пример',
        };
    }
}
