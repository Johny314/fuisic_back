<?php

namespace Database\Factories;

use App\Models\Test\Test;
use App\Models\Test\TestHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestHistoryFactory extends Factory
{
    protected $model = TestHistory::class;

    public function definition(): array
    {
        return [
            'test_id' => Test::factory(),
            'user_id' => User::factory(),
            'answer' => $this->faker->text(200),
            'completion_time' => $this->faker->numberBetween(30, 180),
        ];
    }
}
