<?php

namespace Database\Factories;

use App\Enums\Classifications;
use App\Enums\Difficulty;
use App\Enums\Subject;
use App\Models\Card\CardSet;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardSetFactory extends Factory
{
    protected $model = CardSet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'subject' => Subject::physics->value,
            'section_id' => Section::factory(),
            'class' => $this->faker->randomElement([
                Classifications::first->value,
                Classifications::second->value,
                Classifications::third->value,
            ]),
            'difficulty' => $this->faker->randomElement([
                Difficulty::easy->value,
                Difficulty::medium->value,
                Difficulty::hard->value,
            ]),
            'user_id' => User::factory(),
        ];
    }
}
