<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 1000000),
            'img' => $this->faker->imageUrl(),
            'content' => $this->faker->text,
            'user_id' => \App\Models\NguoiDungs::factory(),
            'category_id' => \App\Models\Categories::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
