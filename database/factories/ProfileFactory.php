<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Profile;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'image' => 'profiles/default.jpg',
            'role_id' => Role::inRandomOrder()->first()?->id,
            'position' => $this->faker->jobTitle,
            'department_id' => Department::inRandomOrder()->first()?->id,
            'detail' => $this->faker->paragraph,
            'message' => $this->faker->sentence,
        ];
    }
}
