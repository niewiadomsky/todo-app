<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'title' => fake()->sentence(3),
            'category_id' => Category::factory(),
            'is_completed' => false,
            'assigned_to' => User::factory(),
            'estimated_minutes' => floor(fake()->numberBetween(30, 300) / 10) * 10,
            'created_by' => User::factory(),
        ];
    }
}
