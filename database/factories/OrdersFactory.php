<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(0, 10000),
            'customer_id' => \App\Models\Customers::factory(),
            'status' => $this->faker->text(100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
