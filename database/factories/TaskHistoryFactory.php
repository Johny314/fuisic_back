<?php

namespace Database\Factories;

use App\Models\Test\Task;
use App\Models\Test\TaskHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskHistoryFactory extends Factory
{
    protected $model = TaskHistory::class;

    public function definition(): array
    {
        return [
            'task_id' => Task::factory(),
            'problem_statement' => $this->faker->sentence(),
            'answer' => $this->faker->word(),
            'description' => $this->faker->optional()->text(200),
        ];
    }
}
