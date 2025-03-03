<?php

namespace App\Data\Test;

use App\Data\Data;
use App\Models\Test\Task as Model;
use App\OpenApi\Property;
use Illuminate\Http\Request;
use OpenApi\Attributes\Schema;

#[Schema(required: ['problem_statement', 'answer'])]
class Task extends Data
{
    #[Property(readOnly: true, example: '1')]
    public ?int $id;

    #[Property(writeOnly: true, example: '1')]
    public ?string $test_id;

    #[Property(example: 'What is 2 + 2?')]
    public ?string $problem_statement;

    #[Property(example: '4')]
    public string $answer;

    #[Property(example: 'Addition problem')]
    public ?string $description;

    #[Property(schema: Test::class, readOnly: true)]
    public ?Test $test;

    public static function fromRequest(Request $request): Task
    {
        return static::from($request->toArray());
    }

    public static function fromModel(Model $model): Task
    {
        return static::from([
                'test' => Test::from($model->test),
            ] + $model->toArray());
    }
}
