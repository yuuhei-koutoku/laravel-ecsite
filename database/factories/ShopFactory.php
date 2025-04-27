<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id' => Owner::factory(),
            'name' => $this->faker->company,
            'information' => $this->faker->realText(10),
            'filename' => 'default.jpg',
            'is_selling' => true,
        ];
    }
}
