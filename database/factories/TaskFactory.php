<?php

namespace Database\Factories;

use App\Models\Test\Task;
use App\Models\Test\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'test_id' => Test::factory(),
            'problem_statement' => $this->faker->sentence(),
            'answer' => $this->faker->word(),
        ];
    }
}
