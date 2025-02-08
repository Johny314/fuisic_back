<?php

namespace Database\Factories;

use App\Models\Card\CardSet;
use App\Models\Card\CardSetHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardSetHistoryFactory extends Factory
{
    protected $model = CardSetHistory::class;

    public function definition(): array
    {
        return [
            'card_set_id' => CardSet::factory(),
            'user_id' => User::factory(),
            'completion_time' => $this->faker->numberBetween(30, 180),
        ];
    }
}
