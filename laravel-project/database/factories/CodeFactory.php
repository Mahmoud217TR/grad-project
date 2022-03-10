<?php

namespace Database\Factories;

use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => Code::getStatus('approved'),
        ];
    }

    public function requested()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Code::getStatus('requested'),
            ];
        });
    }

    public function approved()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Code::getStatus('approved'),
            ];
        });
    }
}
