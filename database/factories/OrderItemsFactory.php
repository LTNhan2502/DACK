<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(0, 10000),
            'order_id' => \App\Models\Orders::factory(),
            'product_id' => \App\Models\Products::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
