<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Test\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    protected $model = Test::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'section_id' => Section::factory(),
            'class' => $this->faker->optional()->word(),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'user_id' => User::factory(),
        ];
    }
}
