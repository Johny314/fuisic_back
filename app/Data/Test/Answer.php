<?php

namespace App\Data\Test;

use App\Data\Data;
use App\OpenApi\Property;
use OpenApi\Attributes\Schema;

#[Schema(required: ['task_id'])]
class Answer extends Data
{
    #[Property(example: '1')]
    public int $task_id;

    #[Property(example: '1')]
    public ?string $answer;
}
