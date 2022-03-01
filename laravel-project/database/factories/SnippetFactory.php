<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Snippet>
 */
class SnippetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->paragraph(),
            'note' => $this->faker->paragraph(),
            'status' => $this->faker->numberBetween(0, 1),
            'user_id' => User::factory(),
            'language_id' => Language::factory(),
            'code_id' => Code::factory(),
        ];
    }
}
