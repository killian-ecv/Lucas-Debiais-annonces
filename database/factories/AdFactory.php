<?php

namespace Database\Factories;

use App\Enums\Categories;
use App\Enums\Deliveries;
use App\Enums\States;
use App\Enums\Trades;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(2);

        return [
            'user_id' => User::all()->random()->id,
            'title' => rtrim($title, '.'),
            'category' => fake()->randomElement(Categories::cases()),
            'description' => fake()->paragraph(6),
            'price' => fake()->randomFloat(2, 0, 200),
            'city' => fake()->city(),
            'state' => fake()->randomElement(States::cases()),
            'year_prod'=> fake()->numberBetween(0, date("Y")),
            'height'=> fake()->randomFloat(2, 0, 200),
            'width'=> fake()->randomFloat(2, 0, 200),
            'depth'=> fake()->randomFloat(2, 0, 200),
            'weight'=> fake()->randomFloat(2, 0, 200),
            'expiration_date'=> fake()->dateTimeBetween('0 week', '+5 week'),
            'delivery' => fake()->randomElement(Deliveries::cases()),
            'warranties' => fake()->paragraph(6),
            'trade' => fake()->randomElement(Trades::cases())
        ];
    }
}
