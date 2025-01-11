<?php

namespace App\Data\Example;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema]
class Example extends Data
{
    #[Property]
    public string $message;
}
