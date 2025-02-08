<?php

namespace Database\Factories;

use App\Models\Card\Card;
use App\Models\Card\CardSet;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition(): array
    {
        return [
            'card_set_id' => CardSet::factory(),
            'front_text' => $this->faker->text(100),
            'back_text' => $this->faker->text(100),
            'description' => $this->faker->optional()->text(200),
        ];
    }
}
